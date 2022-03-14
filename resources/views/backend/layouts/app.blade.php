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
    {{-- <script src="https://cdn.tiny.cloud/1/0oxll7pgyhfl1vrj9gd4mp1bkayc6rnngrfhi6yne2j2igac/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src='https://cdn.tiny.cloud/1/0oxll7pgyhfl1vrj9gd4mp1bkayc6rnngrfhi6yne2j2igac/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/0oxll7pgyhfl1vrj9gd4mp1bkayc6rnngrfhi6yne2j2igac/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/footer.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="assets/js/backend.js"></script>


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
            $('.nav-dropdown').not($(this).parent()).removeClass('open')
            $(this).parent().toggleClass('open')
        })



        function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }

  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }

}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}
/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);

  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';

    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';

    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");

    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;

    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();

  }
}
    </script>
   

    </body>
</html>
