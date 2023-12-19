<!-- Footer
            ============================================= -->
<footer id="footer" class="dark">
    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">

            <div class="row col-mb-30">

                <div class="col-md-6 text-center text-md-start">
                    Copyrights &copy; <?php echo date('Y');?> Todos los derechos reservados para Parking Balcón de baeza.<br>
                    <div class="copyright-links"><a href="#">Política de privacidad</a></div>
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end mb-2">
                        <a href="{{ setting('site.facebook') }}" target="_blank" class="social-icon border-transparent si-small h-bg-facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="{{ setting('site.google_maps') }}" target="_blank" class="social-icon border-transparent si-small h-bg-pinterest">
                            <i class="fa-solid fa-location-dot"></i>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>

                    <i class="bi-envelope"></i> <a href="mailto:{{ setting('site.email') }}"> {{ setting('site.email') }}</a><span class="middot">&middot;</span> <i class="fa-solid fa-phone"></i> <a href="tel:{{ str_replace(' ','', setting('site.phone')) }}"> {{ setting('site.phone') }}</a>
                </div>

            </div>

        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->
