<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Models\InvoiceClient;
use App\Models\InvoiceLine;
use App\Models\PageBlock;
use App\Models\PriceAnnouncement;
use App\Models\BlogsAd as BlogAd;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;

class Pages extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        $pagesBlock = PageBlock::where('page_id', $dataTypeContent->id)->where('parent_id', 0)->get();

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'pagesBlock'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof \Illuminate\Database\Eloquent\Model ? $id->{$id->getKeyName()} : $id;

        $model = app($dataType->model_name);
        $query = $model->query();
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
            $query = $query->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $query = $query->withTrashed();
        }

        $data = $query->findOrFail($id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();

        // Get fields with images to remove before updating and make a copy of $data
        $to_remove = $dataType->editRows->where('type', 'image')
            ->filter(function ($item, $key) use ($request) {
                return $request->hasFile($item->field);
            });
        $original_data = clone($data);

        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);


        if($request->has('img')) {
            foreach($request->img as $keyImg => $img) {
                $imageName = md5(time()+100).'.'.$img->extension();
                sleep(1);
                $this->uploadImg($data->id, $request->get('idblockimg')[$keyImg], $imageName, $img);
            }
        }

        if($request->has('blockGallery')) {
            $requestData = $request->toArray();
            dump($requestData);
            foreach($requestData['blockGallery'] as $blockGallery) {
                dump($requestData["imgGallery$blockGallery"]);
                if(isset($requestData["imgGallery$blockGallery"])) {
                    foreach($requestData["imgGallery$blockGallery"] as $keyImg => $img) {
                        $imageName = md5(time()+100).'.'.$img->extension();
                        sleep(1);
                        $this->uploadImgGallery($data->id, $imageName, $img, $blockGallery);
                    }
                }
            }
        }

        if($request->has('typetext')) {
            foreach($request->typetext as $keyText => $text) {
                $this->saveText($data->id, $request->get('idblocktext')[$keyText], $text);
            }
        }

        if($request->has('iframe')) {
            foreach($request->iframe as $keyIframe => $iframe) {
                $this->saveIframe($data->id, $request->get('idblockiframe')[$keyIframe], $iframe);
            }
        }

        if($request->has('titles')) {
            foreach($request->titles as $keyTitle => $title) {
                $this->saveTitle($data->id, $request->get('idblocktitle')[$keyTitle], $title);
            }
        }

        // Delete Images
        $this->deleteBreadImages($original_data, $to_remove);

        event(new BreadDataUpdated($dataType, $data));

        if (auth()->user()->can('browse', app($dataType->model_name))) {
            $redirect = redirect()->route("voyager.{$dataType->slug}.index");
        } else {
            $redirect = redirect()->back();
        }

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated')." {$dataType->getTranslatedAttribute('display_name_singular')}",
            'alert-type' => 'success',
        ]);
    }


    public function addBlockPage(Request $request)
    {
        $pageBlock = null;
        if($request->get('pageId') > 0) {
            $pageBlock = new PageBlock();
            $pageBlock->page_id = $request->get('pageId');
            $pageBlock->block_type = $request->get('typeBlock');
            $pageBlock->save();
        }

        $galleryId = 0;
        if($request->get('typeBlock') == 1) {
            return Voyager::view('voyager::pages.partials.type-img-block', compact('pageBlock'));
        }
        if($request->get('typeBlock') == 2) {
            return Voyager::view('voyager::pages.partials.type-gallery-block', compact('pageBlock'));
        }
        if($request->get('typeBlock') == 3) {
            return Voyager::view('voyager::pages.partials.type-text-block', compact('pageBlock'));
        }
        if($request->get('typeBlock') == 4) {
            return Voyager::view('voyager::pages.partials.type-iframe-block', compact('pageBlock'));
        }
        if($request->get('typeBlock') == 5) {
            return Voyager::view('voyager::pages.partials.type-title-block', compact('pageBlock'));
        }
        if($request->get('typeBlock') == 6) {
            if(isset($pageBlock)) {
                return Voyager::view('voyager::pages.partials.type-gallery-block', compact('pageBlock'));
            } else {
                $galleryId = $request->get('galleryId')+1;
                return Voyager::view('voyager::pages.partials.type-gallery-block', compact('galleryId'));
            }
        }
    }

    public function addBlockImg(Request $request)
    {
        $galleryBlockId = $request->get('galleryBlockId');
        return Voyager::view('voyager::pages.partials.type-gallery-img-block', compact('galleryBlockId'));
    }

    public function updateOrderBlockPage(Request $request)
    {
        $pageBlock = PageBlock::find($request->get('pageBlockId'));
        if(isset($pageBlock)) {
            $pageBlock->orden = $request->get('orden');
            $pageBlock->save();
            return redirect()->back();
        }
        return redirect()->back()->with([
            'message'    => __('voyager::generic.error_deleting')." {'Error al intentar actualizar orden elemento'}",
            'alert-type' => 'error',
        ]);
    }

    public function removeBlock(Request $request, $id)
    {
        $pageBlock = PageBlock::find($id);
        if(isset($pageBlock)) {
            $pageBlock->delete();
            return redirect()->back();
        }
        return redirect()->back()->with([
            'message'    => __('voyager::generic.error_deleting')." {'Error al intentar borrar elemento'}",
            'alert-type' => 'error',
        ]);
    }

    private function uploadImg($pageId, $blockId, $name, $file)
    {
        $upload = $file->move(public_path('storage/pages/'.$pageId), $name);
        $pageBlock = PageBlock::where('id', $blockId)->first();
        if (isset($pageBlock)){
            $pageBlock->img = $name;
            $pageBlock->save();
        } else {
            $pageBlock = new PageBlock();
            $pageBlock->page_id = $pageId;
            $pageBlock->block_type = 1;
            $pageBlock->img = $name;
            $pageBlock->save();
        }
    }

    private function uploadImgGallery($pageId, $name, $file, $blockGalleryId)
    {
        $upload = $file->move(public_path('storage/pages/'.$pageId), $name);
        $pageBlockGallery = PageBlock::where('id', $blockGalleryId)->first();

        $pageBlock = new PageBlock();
        $pageBlock->page_id = $pageId;
        $pageBlock->block_type = 1;
        $pageBlock->img = $name;
        $pageBlock->parent_id = $pageBlockGallery->id;
        $pageBlock->save();
    }

    private function saveText($pageId, $blockId, $text)
    {
        $pageBlock = PageBlock::where('id', $blockId)->first();
        if (isset($pageBlock)){
            $pageBlock->text = $text;
            $pageBlock->save();
        } else {
            $pageBlock = new PageBlock();
            $pageBlock->page_id = $pageId;
            $pageBlock->block_type = 3;
            $pageBlock->text = $text;
            $pageBlock->save();
        }
    }

    private function saveIframe($pageId, $blockId, $iframe)
    {
        $pageBlock = PageBlock::where('id', $blockId)->first();
        if (isset($pageBlock)){
            $pageBlock->iframe = $iframe;
            $pageBlock->save();
        } else {
            $pageBlock = new PageBlock();
            $pageBlock->page_id = $pageId;
            $pageBlock->block_type = 4;
            $pageBlock->iframe = $iframe;
            $pageBlock->save();
        }
    }

    private function saveTitle($pageId, $blockId, $title)
    {
        $pageBlock = PageBlock::where('id', $blockId)->first();
        if (isset($pageBlock)){
            $pageBlock->title = $title;
            $pageBlock->save();
        } else {
            $pageBlock = new PageBlock();
            $pageBlock->page_id = $pageId;
            $pageBlock->block_type = 5;
            $pageBlock->title = $title;
            $pageBlock->save();
        }
    }
}
