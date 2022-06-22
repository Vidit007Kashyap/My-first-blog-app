<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO --}}
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Vidit Kashyap">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.4/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <div id="app">
        @include('layouts.inc.frontend-navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.4/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')
    <script>
        iziToast.settings({
            position: 'topRight',
            timeout: 4000,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOut',
            progressBar: false,
            close: true,
            closeOnClick: true,
        });
        @if (Session::has('error'))
            iziToast.show({
                title: 'Error',
                message: '{{ Session::get('error') }}',
                color: 'red',
            });
        @endif
        @if (Session::has('success'))
            iziToast.show({
                title: 'Success',
                message: '{{ Session::get('success') }}',
                color: 'green',
            });
        @endif
        @if (Session::has('warning'))
            iziToast.show({
                title: 'Warning',
                message: '{{ Session::get('warning') }}',
                color: 'yellow',
            });
        @endif
        @if (Session::has('info'))
            iziToast.show({
                title: 'Info',
                message: '{{ Session::get('info') }}',
                color: 'blue',
            });
        @endif
    </script>
</body>

</html>
