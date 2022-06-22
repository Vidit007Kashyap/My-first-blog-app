<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top" class="sidebar-toggled">

    {{-- page wrapper --}}
    <div id="wrapper">

        {{-- sidebar --}}
        @include('layouts.inc.admin-sidebar')

        {{-- content-wrapper --}}
        <div id="content-wrapper">

            {{-- main-content --}}
            <div id="content">

                {{-- top navbar --}}
                @include('layouts.inc.admin-navbar')
                {{-- end of top navbar --}}

                {{-- page-content --}}
                <div class="container-fluid">
                    @yield('content')
                </div>
                {{-- end of page-content --}}

            </div>
            {{-- end of main-content --}}

            {{-- footer --}}
            @include('layouts.inc.admin-footer')
            {{-- end of footer --}}

        </div>
        {{-- end of content-wrapper --}}

    </div>
    {{-- end of wrapper --}}

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        // $(document).ready(function() {
            $('#dataTable').DataTable();
        // });
    </script>
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
