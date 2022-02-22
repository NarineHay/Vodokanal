<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Starter')">
    <meta name="author" content="@yield('meta_author', 'FasTrax Infotech')">
    @yield('meta')

    @stack('before-styles')
    {{-- {{ style(mix('css/backend.css')) }} --}}
    <link href="{{  asset('css/backend.css') }}" rel="stylesheet">

     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/footer.css') }}" rel="stylesheet">

    @yield('style')
    @stack('after-styles')

</head>
    <body class="app header-fixed sidebar-fixed aside-menu-off-canvas sidebar-lg-show">

        <div id="app">
            @include('backend.includes.nav')

            <header class="app-header navbar user-account-header">
                <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </header>
            <div class="out-container"></div>
            <div class="container user-account-containet">

                <div class="app-body mt-0">
                    @include('backend.includes.sidebar')
                    <main class="main">

                    @yield('content')
                    </main>
                </div>
            </div><!-- container -->

        </div><!-- #app -->
        {{-- @include('frontend.includes.footer') --}}

        <!-- Scripts -->
    {{-- {!! script(mix('js/manifest.js')) !!} --}}
    {{-- {!! script(mix('js/vendor.js')) !!} --}}
    {{-- {!! script(mix('js/backend.js')) !!} --}}
    {{-- <script src="{{ asset('/js/tinymce/tinymce.min.js')}}"></script> --}}
    {{-- {!! script(asset('js/backend/common.js')) !!} --}}

    @isset($js)
    @foreach($js as $j)
    {{-- {!! script(asset('js/backend/'. $j. '.js')) !!} --}}
    @endforeach
    @endif

    @stack('after-scripts')

    @yield('pagescript')
    <script>
        $('.sidebar-toggler').on('click', function(){
            $('.sidebar-lg-show').toggleClass('sidebar-show')
        })
    </script>
    </body>
</html>
