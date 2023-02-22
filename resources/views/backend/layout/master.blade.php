<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ Vite::image('favicon.png') }}" type="image/png" />
    <title>{{ $metaTitle ?? config('app.name') }}</title>

    <!-- Google fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('dynamic_css')
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        <!--sidebar wrapper -->
        @includeIf('backend.layout.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @includeIf('backend.layout.header')
        <!--end header -->

        <div class="page-wrapper">
            <div class="page-content">
                {{ $slot }}
            </div>
            <!-- /.page-content -->
        </div>
        <!-- /.page-wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>

        </footer>

        @stack('dynamic_js')

        @livewireScripts




    </div>
    <!-- /.wrapper -->
</body>

</html>