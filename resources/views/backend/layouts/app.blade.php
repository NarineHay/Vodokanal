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
     <script src="https://cdn.tiny.cloud/1/0oxll7pgyhfl1vrj9gd4mp1bkayc6rnngrfhi6yne2j2igac/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src='https://cdn.tiny.cloud/1/0oxll7pgyhfl1vrj9gd4mp1bkayc6rnngrfhi6yne2j2igac/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/0oxll7pgyhfl1vrj9gd4mp1bkayc6rnngrfhi6yne2j2igac/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/footer.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

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
        $('.nav-dropdown-toggle').on('click', function(){
            $(this).parent().toggleClass('open')
        })
    </script>
    <script>
        var varCount = 1;
        $(function () {
            $('#addVar').on('click', function(){
                varCount++;
                $node = '<p>'
                  + '<input class="form-control "placeholder="Card number" type="number" name="card_number[]" id="var1">'
                  + '<br>'
                  + '<span class = "removeVar"> Удалить </span> </p>';
                $(this).parent().before($node);
            });
          $('form').on('click', '.removeVar', function(){
            $(this).parent().remove();
          });
        });
    </script>
    <script>
    // const btn1 = document.getElementById('btn1');
    // const box1 = document.getElementById('box1');

    // const btn2 = document.getElementById('btn2');
    // const box2 = document.getElementById('box2');

        btn1.addEventListener('click', function onClick(event) {

            box1.style.backgroundColor = 'red';
            box2.style.backgroundColor = 'white';

        });
        btn2.addEventListener('click', function onClick(event) {

            box2.style.backgroundColor = 'green';
            box1.style.backgroundColor = 'white';

        });
</script>
    </body>
</html>
