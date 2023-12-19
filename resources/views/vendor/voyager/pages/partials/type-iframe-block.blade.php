<br>
<div class="row" id="block">
    <div class="@if(isset($pageBlock)  && $pageBlock->fixed == 0) col-sm-8 col-8 @else col-sm-12 col-12 @endif">
        <label for="iframe" class="form-label">Iframe</label>
        <input type="text" class="form-control" id="iframe" name="iframe[]"
               placeholder="Introduce iframe"
               value="{{(isset($pageBlock)) ? $pageBlock->iframe : '' }}">
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
<input type="hidden" name="idblockiframe[]" value="@if(isset($pageBlock)){{$pageBlock->id}} @else 0 @endif">

