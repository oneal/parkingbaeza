@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataTypeContent->title)

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @section('page_header')
                    <h1 class="page-title">
                        <i class="{{ $dataType->icon }}"></i>
                        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
                    </h1>
                    @if($edit)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBlock">Añadir bloque</button>
                    @endif
                    @include('voyager::multilingual.language-selector')
                @stop
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form role="form"
                              class="form-edit-add"
                              action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                              method="POST" enctype="multipart/form-data">
                            <!-- PUT Method if we are editing -->
                            @if($edit)
                                {{ method_field("PUT") }}
                            @endif

                            <!-- CSRF TOKEN -->
                            {{ csrf_field() }}

                            <div class="panel-body">
                                @if(!empty($breadCrumb))
                                    <div style="margin-left: 1rem;" class="breadcrumb-container">
                                        @foreach($breadCrumb as $key => $part)
                                            <a href="{{ $part['url'] }}">{{ $part['text'] }}</a>
                                            @if($key != (count($breadCrumb) - 1))
                                                <span> / </span>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Adding / Editing -->
                                @php
                                    $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                @endphp

                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">{{$dataTypeRows->where('field', 'title')->first()->getTranslatedAttribute('display_name')}}</label>
                                    @include('voyager::formfields.text', ['options' => $dataTypeRows->where('field', 'title')->first()->details, 'row' => $dataTypeRows->where('field', 'title')->first()])
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">{{$dataTypeRows->where('field', 'body')->first()->getTranslatedAttribute('display_name')}}</label>
                                    @include('voyager::formfields.rich_text_box', ['options' => $dataTypeRows->where('field', 'body')->first()->details, 'row' => $dataTypeRows->where('field', 'body')->first()])
                                </div>
                                <div class="form-group col-md-12" id="block-page">
                                    @if(isset($pagesBlock) && $pagesBlock->count() > 0)
                                        @foreach($pagesBlock as $pageBlock)
                                            @if($pageBlock->block_type == 1)
                                                @include('voyager::pages.partials.type-img-block', ['pageBlock' => $pageBlock, 'page' => $dataTypeContent])
                                            @endif
                                            @if($pageBlock->block_type == 3)
                                                @include('voyager::pages.partials.type-text-block', ['pageBlock' => $pageBlock, 'page' => $dataTypeContent])
                                            @endif
                                            @if($pageBlock->block_type == 4)
                                                @include('voyager::pages.partials.type-iframe-block', ['pageBlock' => $pageBlock, 'page' => $dataTypeContent])
                                            @endif
                                            @if($pageBlock->block_type == 5)
                                                @include('voyager::pages.partials.type-title-block', ['pageBlock' => $pageBlock, 'page' => $dataTypeContent])
                                            @endif
                                            @if($pageBlock->block_type == 6)
                                                @include('voyager::pages.partials.type-gallery-block', ['pageBlock' => $pageBlock, 'page' => $dataTypeContent])
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">{{$dataTypeRows->where('field', 'excerpt')->first()->getTranslatedAttribute('display_name')}}</label>
                                    @include('voyager::formfields.text_area', ['options' => $dataTypeRows->where('field', 'excerpt')->first()->details, 'row' => $dataTypeRows->where('field', 'excerpt')->first()])
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">{{$dataTypeRows->where('field', 'meta_keywords')->first()->getTranslatedAttribute('display_name')}}</label>
                                    @include('voyager::formfields.text', ['options' => $dataTypeRows->where('field', 'meta_keywords')->first()->details, 'row' => $dataTypeRows->where('field', 'meta_keywords')->first()])
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">{{$dataTypeRows->where('field', 'meta_description')->first()->getTranslatedAttribute('display_name')}}</label>
                                    @include('voyager::formfields.text_area', ['options' => $dataTypeRows->where('field', 'meta_description')->first()->details, 'row' => $dataTypeRows->where('field', 'meta_description')->first()])
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">{{$dataTypeRows->where('field', 'status')->first()->getTranslatedAttribute('display_name')}}</label>
                                    @include('voyager::formfields.select_dropdown', ['options' => $dataTypeRows->where('field', 'status')->first()->details, 'row' => $dataTypeRows->where('field', 'status')->first()])
                                </div>

                            </div><!-- panel-body -->
                            <div class="panel-footer">
                                @section('submit-buttons')
                                    <button type="submit"
                                            class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                                @stop
                                @yield('submit-buttons')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addBlock">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Añadir bloque</h4>
                </div>

                <div class="modal-body">
                    <label class="control-label" for="name">Tipo bloque</label>
                    <select class="form-control" id="type-block" aria-label="Selecciona un tipo">
                        <option selected>Selecciona un tipo</option>
                        <option value="1">Imagen</option>
                        <option value="3">Texto</option>
                        <option value="4">Iframe</option>
                        <option value="5">Titulo</option>
                        <option value="6">Galería</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addBlockPage(@if($add){{$dataTypeContent->id}}@endif">Añadir</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        function addBlockPage(pageId=0) {
            var typeBlock = $('#type-block').val();

            var galleryId = 0;
            if(typeBlock === 6) {
                galleryId = $("#block").find("#gallery").length
            }
            $.ajax({
                url : "{!! route('add.block') !!}",
                data : { typeBlock : typeBlock, galleryId: galleryId, pageId: pageId },
                type : 'get',
                dataType : 'html',
                success : function(resp) {
                    $('#block-page').append(resp);
                    $('#addBlock').modal('hide');
                    var offset = ($('#block').offset().top + $('#block-page').height()) - 300;
                    $("html, body").animate({ scrollTop: offset }, 1000);
                },
                error : function(jqXHR, status, error) {
                    alert('Disculpe, existió un problema');
                }
            });
        }

        function addBlockImg(galleryBlockId=0) {

            $.ajax({
                url : "{!! route('add.block.img') !!}",
                data : { galleryBlockId : galleryBlockId },
                type : 'get',
                dataType : 'html',
                success : function(resp) {
                    $('#img-gallery'+galleryBlockId).append(resp);
                },
                error : function(jqXHR, status, error) {
                    alert('Disculpe, existió un problema');
                }
            });
        }
    </script>

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

            $(this).on('change', '#order', function(){
                $.ajax({
                    url : "{!! route('update.order.block') !!}",
                    data : { orden : $(this).val(), pageBlockId: $(this).attr("data-id") },
                    type : 'post',
                    dataType : 'html',
                    success : function(resp) {
                    },
                    error : function(jqXHR, status, error) {
                        alert('Disculpe, existió un problema');
                    }
                });
            });
        });
    </script>

@stop

