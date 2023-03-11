<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="docsearch:language" content="en">
    <meta name="docsearch:version" content="4.5">

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

    <!-- Favicons -->
    <link href="swabalamban/swabalamban/images/favicon.png" rel="icon">
    <link href="swabalamban/swabalamban/images/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('swabalamban/swabalamban/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('swabalamban/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('swabalamban/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('swabalamban/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('swabalamban/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('swabalamban/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('swabalamban/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('swabalamban/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Sailor - v4.10.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


    @yield('style')


</head>

<body>

    @include('layouts.frontend.inc.header')

    <main id="main">

        @yield('content')

    </main>


    @include('layouts.frontend.inc.footer')

    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('swabalamban/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('swabalamban/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('swabalamban/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('swabalamban/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('swabalamban/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('swabalamban/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('swabalamban/js/main.js') }}"></script>


    @yield('script')


</body>

</html>
