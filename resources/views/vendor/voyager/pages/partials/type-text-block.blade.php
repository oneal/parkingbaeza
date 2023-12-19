<?php $id = substr(md5(time()), 0, 8);?>
<br/>

<div class="row" idÇ="block">
    <div class="@if(isset($pageBlock) && $pageBlock->fixed == 0) col-sm-8 col-8 @else col-sm-12 col-12 @endif">
        <label for="richtext-{{$id}}" class="form-label">Texto</label>
        <textarea class="form-control richTextBox" name="typetext[]" id="richtext-{{$id}}" style="margin-top: 20px">
            {{ isset($pageBlock) ? $pageBlock->text : '' }}
        </textarea>
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
<input type="hidden" name="idblocktext[]" value="@if(isset($pageBlock)){{$pageBlock->id}} @else 0 @endif">
@if(!isset($pageBlock))
<script>
    $(document).ready(function() {
        var additionalConfig = {
            selector: "textarea.richTextBox[name='typetext[]']",
            toolbar: [
                { name: 'history', items: [ 'undo', 'redo' ] },
                { name: 'styles', items: [ 'styles' ] },
                { name: 'formatting', items: [ 'bold', 'italic' ] },
                { name: 'list', items: ['numlist', 'bullist'] },
                { name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ] },
                { name: 'indentation', items: [ 'outdent', 'indent' ] },
                { name: 'image', items: ['image'] },
                { name: 'code', items: ['code'] },
                { name: 'table', items: ['table']}
            ]
        }

        tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));
    });
</script>
@endif
