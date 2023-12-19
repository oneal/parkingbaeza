<br/>
<div class="row" id="block">
    <div class="@if(isset($pageBlock) && $pageBlock->fixed == 0) col-sm-8 col-8 @else col-sm-12 col-12 @endif">
        @if(isset($pageBlock))
            <div data-field-name="img-block">
                <img src="{{ Voyager::image('pages/'.$pageBlock->page_id.'/'.$pageBlock->img) }}"
                     data-file-name="img-block" data-id="img-block"
                     style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
            </div>
        @endif
        <input type="file" name="img[]" accept="image/*">
        <input type="hidden" name="idblockimg[]" value="@if(isset($pageBlock)){{$pageBlock->id}} @else 0 @endif">
    </div>
    @if(isset($pageBlock) && $pageBlock->fixed == 0)
        <div class="col-sm-3 col-3">
            <label for="order" class="form-label">Orden</label>
            <input type="number" id="order" name="order" data-id="{{$pageBlock->id}}" class="form-control" value="{{ $pageBlock->orden }}" placeholder="Orden">
        </div>
    @endif
    @if(isset($pageBlock) && $pageBlock->fixed == 0)
        <div class="col-sm-1 col-1">
            <a href="{{route('remove.block', $pageBlock->id)}}" class="btn btn-danger"><span class="icon voyager-trash"></span></a>
        </div>
    @endif
</div>

