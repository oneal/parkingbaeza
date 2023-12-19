<br/>
<div class="row" id="block">
    <div class="col-sm-12">
        <div class="row" id="gallery">
            <div class="col-xs-12 col-sm-6" style="margin-top: 20px">
                <h4>Gallería</h4>
            </div>

            @if(isset($pageBlock) && $pageBlock->fixed == 0)
                <div class="col-sm-3 col-xs-6">
                    <label for="order" class="form-label">Orden</label>
                    <input type="number" id="order" name="order" data-id="{{$pageBlock->id}}" class="form-control" value="{{ $pageBlock->orden }}" placeholder="Orden">
                </div>
            @endif
            <div class="@if(isset($pageBlock))col-sm-2 col-xs-3 @else col-sm-3 col-xs-3 @endif right" style="margin-top: 20px; text-align: right;">
                <a href="javascript:void(0)" onclick="addBlockImg({{ $galleryBlockId = (isset($pageBlock)) ? $pageBlock->id : $galleryId }})" class="btn btn-success"><span class="icon voyager-plus"></span></a>
            </div>
            @if(isset($pageBlock))
                <div class="col-sm-1 col-xs-3" style="margin-top: 20px; text-align: right;">
                    <a href="{{route('remove.block', $pageBlock->id)}}" class="btn btn-danger"><span class="icon voyager-trash"></span></a>
                </div>
            @endif
            <?php
            $blockGallery = 'blockGallery';
            ?>
            <input type="hidden" name="<?php echo $blockGallery;?>[]" value="@if(isset($pageBlock)){{$pageBlock->id}} @else {{$galleryId}}@endif">
        </div>
        <hr/>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <?php
                $idImgGallery = 'imgGallery';
                $idblockGalleryImg = 'idblockGalleryImg';
                if(isset($pageBlock)) {
                    $idImgGallery .= $pageBlock->id;
                    $idblockGalleryImg .= $pageBlock->id;
                } else {
                    $idImgGallery .= $galleryId;
                    $idblockGalleryImg .= $galleryId;
                }
                ?>
                <input type="file" multiple="multiple" name="<?php echo $idImgGallery;?>[]" accept="image/*">
            </div>
        </div>
        <div class="row" id="img-gallery{{ $galleryBlockId = (isset($pageBlock)) ? $pageBlock->id : $galleryId }}">
            @if(isset($pageBlock) && \App\Models\PageBlock::where('parent_id', $pageBlock->id)->count() > 0)
                @foreach(\App\Models\PageBlock::where('parent_id', $pageBlock->id)->orderBy('orden', 'ASC')->get() as $itemGallery)
                    <div class="col-xs-12 col-sm-4">
                        <div class="row">
                            <div class="@if(isset($itemGallery) && $itemGallery->fixed == 0) col-sm-7 col-xs-7 @else col-sm-10 col-xs-10 @endif">
                                @if(isset($itemGallery))
                                    <div data-field-name="img-block">
                                        <img src="{{ Voyager::image('pages/'.$itemGallery->page_id.'/'.$itemGallery->img) }}"
                                             data-file-name="img-block" data-id="img-block"
                                             style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                    </div>
                                @endif
                            </div>
                            @if(isset($itemGallery) && $itemGallery->fixed == 0)
                                <div class="col-sm-3 col-xs-3">
                                    <label for="order" class="form-label">Orden</label>
                                    <input type="number" id="order" name="order" data-id="{{$itemGallery->id}}" class="form-control" value="{{ $itemGallery->orden }}" placeholder="Orden">
                                </div>
                            @endif
                            @if(isset($itemGallery) && $itemGallery->fixed == 0)
                                <div class="col-sm-2 col-xs-2">
                                    <a href="{{route('remove.block', $itemGallery->id)}}" class="btn btn-danger"><span class="icon voyager-trash"></span></a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

