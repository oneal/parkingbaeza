<textarea class="form-control richTextBox" name="{{ $row->field }}" id="richtext{{ $row->field }}">
    {{ old($row->field, $dataTypeContent->{$row->field} ?? '') }}
</textarea>

@push('javascript')
    <script>
        $(document).ready(function() {
            var additionalConfig = {
                selector: 'textarea.richTextBox[name="{{ $row->field }}"]',
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

            $.extend(additionalConfig, {!! json_encode($options->tinymceOptions ?? (object)[]) !!})

            tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));
        });
    </script>
@endpush
