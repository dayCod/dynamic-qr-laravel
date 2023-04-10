<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="{{ asset('auth/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- BEGIN: IziToast Alert Library -->
    <link rel="stylesheet" href="{{ asset('lib/izitoast/dist/css/iziToast.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/izitoast/dist/css/iziToast.min.css') }}">
    <!-- END: IziToast Alert-->
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            @include('dashboard.layout.sidebar')
        </nav>

        <div class="main">
            {{-- Navbar --}}
            @include('dashboard.layout.navbar')

            <main class="content">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('dashboard.layout.footer')
        </div>
    </div>

    <script src="{{ asset('auth/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- BEGIN: IziToast Alert Library -->
    <script src="{{ asset('lib/izitoast/dist/js/iziToast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/izitoast/dist/js/iziToast.min.js') }}" type="text/javascript"></script>
    @include('dashboard.layout.app')
    @stack('scripts')
    @include('dashboard.layout.script')

</body>

</html>
