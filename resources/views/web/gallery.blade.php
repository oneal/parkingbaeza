@extends('web/layouts/master')

@section('styles')
@endsection

@section('content')
    <!-- Page Title
    ============================================= -->
    <section class="page-title page-title-mini">
        <div class="container">
            <div class="page-title-row">

                <div class="page-title-content">
                    <h1>{{ $contentPage->title }}</h1>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $contentPage->title }}</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section><!-- .page-title end -->
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Nuestras Instalaciónes</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12 col-sm-12">
                        {!! $contentPage->body !!}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="gallery">
                            <div class="row">
                                @foreach($pageBlocks->where('fixed',1)->where('block_type', 1) as $img)
                                    <div class="col-lg-3 col-sm-4 col-12">
                                        <a href="{{Voyager::image('pages/'.$contentPage->id.'/'.$img->img) }}" data-caption="Parking el Balcón de Baeza">
                                            <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$img->img) }}" alt="Parking el Balcón de Baeza">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @include('web.partials.page_blocks', ['pageBlocks' => $pageBlocks->where('fixed',0)->sortBy('orden')])
            </div>

            @include('web.partials.info_contact')
        </div>
    </section><!-- #content end -->
@endsection
