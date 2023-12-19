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
            </nav>

        </div>
    </div>
</section><!-- .page-title end -->
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">

            <div class="row align-items-stretch col-mb-50 mb-0">
                <div class="col-12 col-sm-12">
                    {!! $contentPage->body !!}
                </div>
            </div>

            <div class="row align-items-stretch col-mb-50 mb-0">
                <!-- Contact Form
                ============================================= -->
                <div class="col-lg-6">

                    <div class="fancy-title title-border">
                        <h3>Envianos un email</h3>
                    </div>

                    <div class="form-widget">

                        <div class="form-result"></div>

                        <form class="mb-0" id="form-contact" action="{{ route('contact.sendcontact') }}" method="post">
                            @honeypot
                            @csrf
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="template-contactform-name">Nombre <small>*</small></label>
                                    <input type="text" name="name" id="name" value="" class="form-control required @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="email" name="email" id="email" value="" class="required email form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-100"></div>

                                <div class="w-100"></div>

                                <div class="col-12 form-group">
                                    <label for="template-contactform-message">Mensaje <small>*</small></label>
                                    <textarea class="required form-control @error('message') is-invalid @enderror" id="message-c" name="message-c" rows="6" cols="30"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <input type="submit" name="submit-form" tabindex="5" value="Enviar" class="button button-3d m-0"/>
                                </div>
                            </div>

                            <input type="hidden" name="prefix" value="template-contactform-">

                        </form>
                    </div>

                </div><!-- Contact Form End -->

                <!-- Google Map
                ============================================= -->
                <div class="col-lg-6 min-vh-50">
                    {!! $pageBlocks->where('id', 39)->where('fixed',1)->first()->iframe !!}
                </div><!-- Google Map End -->
            </div>
            @include('web.partials.page_blocks', ['pageBlocks' => $pageBlocks->where('fixed',0)->sortBy('orden')])
            <!-- Contact Info
            ============================================= -->
            <div class="row col-mb-50">
                <div class="col-sm-12 col-lg-4">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="{{ setting('site.google_maps') }}"><i class="uil uil-map-marker"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>Donde estamos<span class="subtitle">{{ setting('site.address') }}</span></h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="tel:{{ str_replace(' ', '', setting('site.phone')) }}"><i class="bi-telephone"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>Nuestro telefono<span class="subtitle">{{ setting('site.phone') }}</span></h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="mailto:{{ setting('site.email') }}"><i class="fa-solid fa-envelope"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>Nuestro email<span class="subtitle">{{ setting('site.email') }}</span></h3>
                        </div>
                    </div>
                </div>
            </div><!-- Contact Info End -->

        </div>
    </div>
</section><!-- #content end -->
@endsection

@section('scripts')
    <script>
        window.onload = function() {
            var form = document.querySelector("form");
            form.onsubmit = submitted.bind(form);
        }

        function submitted(event) {
            event.preventDefault();
            $('#submit').prop('disabled', true);
        }
    </script>
@endsection
