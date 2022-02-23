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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/footer.css') }}" rel="stylesheet">

        @yield('style')

    </head>
    <body>
        <div id="app">
            @include('includes.nav')

            <div class="">
                @yield('content')
            </div>

            @include('includes.footer')
        </div><!-- #app -->

        <!-- Scripts -->
        {{-- {!! script(mix('js/manifest.js')) !!} --}}
        {{-- {!! script(mix('js/vendor.js')) !!} --}}
        {{-- {!! script(mix('js/frontend.js')) !!} --}}

        {{-- @include('includes.partials.ga') --}}
        <script>
     // smooth scroll to anchor, with option of hash appearing in url. Thanks:
// https://paulund.co.uk/smooth-scroll-to-internal-links-with-jquery
$(document).ready(function(){

	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash;
	    var $target = $(target);
	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    },100, 'swing', function () {
	    });
	});


    $("#button").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#elementtoScrollToID").offset().top
    }, 2000);
    });
    
});
        </script>
    </body>
</html>
