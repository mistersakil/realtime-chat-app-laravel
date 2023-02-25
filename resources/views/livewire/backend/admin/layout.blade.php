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
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{ Vite::image('logo.png') }}" width="180" alt="" />
                        </div>
                        {{ $slot }}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.section-authentication-signin -->
    </div>
    <!-- /.wrapper -->

    @stack('dynamic_js')

    @livewireScripts

</body>

</html>