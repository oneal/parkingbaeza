<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PageBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Page extends Controller
{
    public function index(Request $request, $slug=null)
    {
        if(isset($slug)) {
            $page = \TCG\Voyager\Models\Page::where('slug', $slug)->where('status', 'active')->first();
            $home = false;
        } else {
            $page = \TCG\Voyager\Models\Page::where('slug', 'inicio')->where('status', 'active')->first();
            $home = true;
        }

        if(isset($page)) {
            $metaTitle = $page->title." - ".setting('site.title');
            $metaDescription = isset($page->meta_description) ? $page->meta_description : setting('site.description');
            $metakeyword = (isset($page->meta_keyword) && $page->meta_keyword !== '') ? $page->meta_keyword : null;

            $pageBlocks = PageBlock::where('page_id', $page->id)->get();

            $blogs = null;
            if(isset($page->template) && $page->template == 'blog') {

                $blogs = DB::table('posts')
                    ->where('status', 'PUBLISHED')
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);

                if($blogs->count() == 0){
                    return redirect()->to('/');
                }
            }

            $view = 'web.page';
            if(isset($page->template)) {
                $view = 'web.'.$page->template;
            }

            return view($view, [
                'home' => $home,
                'page' => $page->title,
                'contentPage' => $page,
                'metaTitle' => $metaTitle,
                'metaDescription' => $metaDescription,
                'metakeyword' => $metakeyword,
                'pageBlocks' => $pageBlocks,
                'blogs' => $blogs
            ]);
        }

        return redirect()->to('/');
    }
}
