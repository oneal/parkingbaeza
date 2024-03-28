<!DOCTYPE html>
<html dir="ltr" lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="author" content="SemiColonWeb">
        <meta name="description" content="@if(isset($metaDescription)){{ $metaDescription }}@else{{ setting('site.description') }}@endif">
        @if(isset($metakeyword) && $metakeyword != "")
            <meta name="keywords" content="{{ $metakeyword }}"/>
        @endif
        <meta name="robots" content="index,follow" />
        <!-- Font Imports -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=PT+Serif:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
        <!-- Core Style -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Font Icons -->
        <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
        <!-- Plugins/Components CSS -->
        <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Document Title
        ============================================= -->
        <title>@if(isset($metaTitle)){{ $metaTitle }}@else{{ setting('site.title') }}@endif</title>
    </head>
    <body>
        @include('web.layouts.partials.header')
        @yield('content')
        @include('web.layouts/partials/footer')

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="uil uil-angle-up"></div>
        <!-- Javascripts
        ============================================= -->
        <script src="{{asset('js/functions.js')}}"></script>
        <script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
        <script>
            window.addEventListener('load', function() {
                baguetteBox.run('.gallery');
            });
        </script>
        @yield('scripts')
    </body>
</html>
