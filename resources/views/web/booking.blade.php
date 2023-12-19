@extends('web.layouts.master')

@section('styles')
@endsection

@section('content')
    <!-- Page Title
    ============================================= -->
    <section class="page-title page-title-mini">
        <div class="container">
            <div class="page-title-row">

                <div class="page-title-content">
                    <h1>Reservas</h1>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reservas</li>
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
                    <div class="col-12">
                        <h2>Reserva tu plaza</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        {!! $contentPage->body !!}
                    </div>
                </div>
                @include('web.partials.page_blocks', ['pageBlocks' => $pageBlocks->where('fixed',0)->sortBy('orden')])
            </div>

            @include('web.partials.info_contact')
        </div>
    </section><!-- #content end -->
@endsection
