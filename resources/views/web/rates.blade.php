@extends('web/layouts/master')

@section('styles')
@endsection

@section('content')
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
                </nav></div>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-6 col-sm-12 text-center" data-animate="bounceIn"><em class="i-plain i-xlarge mx-auto mb-0 fa-solid fa-car">&nbsp;</em>
                        <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="100" data-refresh-interval="10" data-speed="2000">&nbsp;</span></div>
                        <h5>Plazas de aparcamiento</h5>
                    </div>
                    <div class="col-lg-6 col-sm-12 text-center" data-animate="bounceIn" data-delay="200"><em class="i-plain i-xlarge mx-auto mb-0 fa-solid fa-building">&nbsp;</em>
                        <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="4" data-refresh-interval="10" data-speed="2500">&nbsp;</span></div>
                        <h5>Plantas de aparcamiento</h5>
                    </div>
                </div>
                <div class="row col-mb-50 mb-0">
                    {!! $contentPage->body !!}
                </div>
                <div class="row col-mb-50 mb-0">
                    <div class="col->12 col-sm-12">
                        <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',40)->where('fixed',1)->first()->img) }}" title="Tarifas parking el balcón de baeza" alt="Tarifas parking el balcón de baeza"/>
                    </div>
                    @include('web.partials.page_blocks', ['pageBlocks' => $pageBlocks->where('fixed',0)->sortBy('orden')])
                </div>
            </div>
            @include('web.partials.info_contact')
        </div>
    </section>
@endsection
