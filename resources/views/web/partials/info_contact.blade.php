<div class="section mt-4 footer-stick">
    <div class="fslider testimonial testimonial-full ml-5" data-animation="fade" data-arrows="false">
        <div class="flexslider">
            <div class="slider-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <h2>¿Necesitas más información?<br>
                                ¡Ponte en contacto con nosotros!
                            </h2>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <h3><i class="fa-solid fa-map-location"></i> {{ setting('site.address') }}</h3>
                            <h3><i class="fa-solid fa-phone"></i><a href="tel:{{str_replace(' ','', setting('site.phone')) }}"> {{ setting('site.phone') }}</a></h3>
                            <h3><i class="fa-solid fa-envelope"></i><a href="mailto:{{ setting('site.email') }}"> {{ setting('site.email') }}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
