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
                <div class="row mb-5">
                    <div class="col-12 col-sm-6">
                        {!! $contentPage->body !!}
                    </div>
                    <div class="col-12 col-sm-6">
                        {!! $pageBlocks->where('block_type', 4)->where('fixed', 1)->first()->iframe !!}
                    </div>
                </div>
                <hr>
                <div class="heading-block text-center mt-5">
                    <h2>¿Por qué elegirnos?</h2>
                </div>
                <div class="row col-mb-50 mb-0">
                    @if($pageBlocks->whereIn('block_type', [3])->count()>0)
                        @foreach($pageBlocks->where('block_type', 3)->where('fixed', 1) as $pageBlock)
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="team team-list row align-items-center">
                                    <div class="team-desc col-sm-12">
                                        {!! $pageBlock->text !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @include('web.partials.page_blocks', ['pageBlocks' => $pageBlocks->where('fixed',0)->sortBy('orden')])
            </div>
        </div>
    </section><!-- #content end -->
@endsection
