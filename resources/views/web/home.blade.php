@extends('web/layouts/master')

@section('styles')
@endsection

@section('content')
    <section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-60 min-vh-md-100 include-header">
        <div class="slider-inner">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',41)->where('fixed',1)->first()->img) }}');"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',42)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',43)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',44)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',45)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',46)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',47)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">Parking El Balcón de Baeza</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">El parking ideal para aparcar tu coche</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',48)->where('fixed',1)->first()->img) }}'); background-position: center top;"></div>
                    </div>
                </div>
                <div class="slider-arrow-left"><i class="uil uil-angle-left-b"></i></div>
                <div class="slider-arrow-right"><i class="uil uil-angle-right-b"></i></div>
            </div>

            <a href="#" data-scrollto="#content" class="one-page-arrow dark"><i class="bi-chevron-down infinite animated fadeInDown"></i></a>

        </div>
    </section>

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-5">
                        <div class="heading-block">
                            <h1>{{$pageBlocks->where('id',49)->where('fixed',1)->first()->title}}</h1>
                        </div>
                        <div class="lead">{!!$pageBlocks->where('id',50)->where('fixed',1)->first()->text!!}</div>
                    </div>

                    <div class="col-lg-7 align-self-end">

                        <div class="position-relative overflow-hidden">
                            <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',52)->where('fixed',1)->first()->img) }}" data-animate="fadeInUp" data-delay="100" alt="Chrome">
                        </div>

                    </div>

                </div>
            </div>

            <div class="section my-0">
                <div class="container">

                    <div class="row mt-4 col-mb-50">

                        <div class="col-lg-4">
                            <i class="fa-brands fa-accessible-icon i-plain color i-large inline-block mb-3"></i>
{{--                            <i class="i-plain color i-large bi-display inline-block mb-3"></i>--}}
                            {!! $pageBlocks->where('id',53)->where('fixed',1)->first()->text !!}
                        </div>

                        <div class="col-lg-4">
                            <i class="i-plain color i-large fa-solid fa-credit-card inline-block mb-3"></i>
                            {!! $pageBlocks->where('id',54)->where('fixed',1)->first()->text !!}
                        </div>

                        <div class="col-lg-4">
                            <i class="i-plain color i-large fa-solid fa-person-military-pointing inline-block mb-3"></i>
                            {!! $pageBlocks->where('id',55)->where('fixed',1)->first()->text !!}
                        </div>

                    </div>

                </div>
            </div>

            <div class="section parallax dark mb-0 ">
                <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',56)->where('fixed',1)->first()->img) }}" class="parallax-bg">

                <div class="heading-block text-center">
                    <h3>Parking de facil acceso y situado en pleno centro de Baeza</h3>
                </div>

                <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <div class="row flex-column text-center align-items-center gy-3">
                                    <div class="col-lg-5">
                                        <h3 class="h6 mb-0 fw-medium"></h3>
                                        <a href="#" class="btn btn-warning">Donde estamos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="portfolio" class="portfolio row g-0 portfolio-reveal grid-container">

                <article class="portfolio-item col-12 col-sm-4 col-md-4 col-lg-4 pf-media pf-icons">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',57)->where('fixed',1)->first()->img) }}" alt="Catedral de Baeza">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item">
                                    <a href="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',57)->where('fixed',1)->first()->img) }}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-hover-parent=".portfolio-item" data-lightbox="image" title="Catedral de Baeza"><i class="uil uil-plus"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item"></div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="portfolio-item col-12 col-sm-4 col-md-4 col-lg-4 pf-illustrations">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',58)->where('fixed',1)->first()->img) }}" alt="Fuente de los leones Baeza">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item">
                                    <a href="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',58)->where('fixed',1)->first()->img) }}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-hover-parent=".portfolio-item" data-lightbox="image" title="Fuente de los leones Baeza"><i class="uil uil-plus"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item"></div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="portfolio-item col-12 col-sm-4 col-md-4 col-lg-4 pf-illustrations">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',59)->where('fixed',1)->first()->img) }}" alt="Salida peatonal Parking el Balcón de Baeza">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item">
                                    <a href="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlocks->where('id',59)->where('fixed',1)->first()->img) }}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-hover-parent=".portfolio-item" data-lightbox="image" title="Salida peatonal Parking el Balcón de Baeza"><i class="uil uil-plus"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item"></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <br/>
            <div class="container">
                {!! $pageBlocks->where('id',60)->where('fixed',1)->first()->text !!}
            </div>
            <?php /*<div class="container">

                <div class="row align-items-center mt-3 mb-2 col-mb-50">
                    <div class="col-md-4 text-center">
                        <img data-animate="fadeInLeft" src="{{Voyager::image('services/indice.jpeg')}}" alt="Iphone">
                    </div>

                    <div class="col-md-8 text-center text-md-start">
                        <div class="heading-block border-bottom-0">
                            <h3>Aparca en pleno centro de Baeza y visita sus monumentos y gastronomía, dejando tu coche en un lugar seguro y al lado del centro histórico.</h3>
                        </div>

                        <p>En Parking Balcón de Baeza sabemos lo incómodos que son los lugares estrechos para los conductores.</p>

                        <p>Es por eso que nuestros accesos, pasillos, rampas y plazas de aparcamiento son lo suficientemente amplias para que maniobrar con tu coche no sea una pesadilla.</p>

                    </div>
                </div>

            </div>*/?>
            <?php /*<div class="section mt-0 border-top-0">
                <div class="container">
                    <div class="heading-block text-center m-0 border-0">
                        <h3>Latest from the Blog</h3>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row posts-md col-mb-30">

                    <div class="col-lg-3 col-md-6">
                        <div class="entry">
                            <div class="entry-image">
                                <a href="#"><img src="{{Voyager::image('magazine/thumb/1.jpg')}}" alt="Image" class="rounded"></a>
                            </div>
                            <div class="entry-title title-xs text-transform-none px-2">
                                <h3><a href="blog-single.html">Bloomberg smart cities; change-makers economic security</a></h3>
                            </div>
                            <div class="entry-meta px-2">
                                <ul>
                                    <li><i class="uil uil-schedule"></i> 13th Jun 2021</li>
                                    <li><a href="blog-single.html#comments"><i class="uil uil-comments-alt"></i> 53</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="entry">
                            <div class="entry-image">
                                <a href="#"><img src="images/magazine/thumb/2.jpg" alt="Image" class="rounded"></a>
                            </div>
                            <div class="entry-title title-xs text-transform-none px-2">
                                <h3><a href="blog-single.html">Medicine new approaches communities, outcomes partnership</a></h3>
                            </div>
                            <div class="entry-meta px-2">
                                <ul>
                                    <li><i class="uil uil-schedule"></i> 24th Feb 2021</li>
                                    <li><a href="blog-single.html#comments"><i class="uil uil-comments-alt"></i> 17</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="entry">
                            <div class="entry-image">
                                <a href="#"><img src="images/magazine/thumb/3.jpg" alt="Image" class="rounded"></a>
                            </div>
                            <div class="entry-title title-xs text-transform-none px-2">
                                <h3><a href="blog-single.html">Significant altruism planned giving insurmountable challenges liberal</a></h3>
                            </div>
                            <div class="entry-meta px-2">
                                <ul>
                                    <li><i class="uil uil-schedule"></i> 30th Dec 2021</li>
                                    <li><a href="blog-single.html#comments"><i class="uil uil-comments-alt"></i> 13</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="entry">
                            <div class="entry-image">
                                <a href="#"><img src="images/magazine/thumb/4.jpg" alt="Image" class="rounded"></a>
                            </div>
                            <div class="entry-title title-xs text-transform-none px-2">
                                <h3><a href="blog-single.html">Compassion conflict resolution, progressive; tackle</a></h3>
                            </div>
                            <div class="entry-meta px-2">
                                <ul>
                                    <li><i class="uil uil-schedule"></i> 15th Jan 2021</li>
                                    <li><a href="blog-single.html#comments"><i class="uil uil-comments-alt"></i> 54</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>*/?>
        </div>
    </section><!-- #content end -->
@endsection
