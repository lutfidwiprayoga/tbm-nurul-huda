<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donasi Buku TBM Nurul Huda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/aos/css/aos.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.min.css">
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/TBM.png" />
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    @include('donatur.layouts.navbar')
    @yield('frontend')
    <div class="content-wrapper">
        <div class="container">
            <footer class="border-top-0">
                <p class="text-center text-muted pt-2">Copyright © 2022<a href="#" class="px-1">TBM Nurul
                        Huda Desa Langring Jambesari.</a>All rights reserved.</p>
            </footer>
        </div>
    </div>
    <script src="{{ asset('frontend') }}/vendors/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/vendors/aos/js/aos.js"></script>
    <script src="{{ asset('frontend') }}/js/landingpage.js"></script>
</body>

</html>
