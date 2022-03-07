<header>
    <style>
      .act:active {
        border-bottom: 1px solid white;
        display: inline-block !important;
      }  
    </style>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="https://img.icons8.com/carbon-copy/100/000000/water.png" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-around w-100 text-white">
                        <li class="nav-item">
                            <a href="#section1" class="nav-link text-white  {{ request()->is('users*') ? 'active' : '' }} act">Тарифы</a>
                        </li>
                
                        <li class="nav-item">
                            <a href="#section2" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }} act">О нас</a>
                        </li>
                   
                        <li class="nav-item">
                            <a href="#section3" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }} act">Способы оплаты</a>
                        </li>
                  
                        <li class="nav-item">
                            <a href="#section4" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }} act">Места терминалов</a>
                        </li>
                
                        <li class="nav-item">
                            <a href="#section5" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }} act">Контакты</a>
                        </li>
                </ul>
                <ul class="navbar-nav d-flex justify-content-center reg" >
                    @auth
                        @if (Request::is('dashboard'))
                            <li class="nav-item ">
                                <a href="#" class="fio nav-link text-white {{ request()->is(['user.infos', 'user.support']) ? 'active' : '' }}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ФИО</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="fio nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ф И О
                                </a>
                                <ul class="dropdown-menu dropdown-nav-ul" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">Профиль </a>
                                    </li>
                                    <li>
                                     
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Выйти') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item d-flex px-2">
                                <a href="{{route('login')}}" class="nav-link text-white {{ request()->is('login*') ? 'active' : '' }}">Логин</a>
                            </li>
                        @endif

                        @if(Route::has('register'))
                            <li class="nav-item login_li px-2">
                                <a href="{{ route('register') }}" class="nav-link text-white {{ request()->is('register*') ? 'active' : '' }}">Регистрация</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            {{-- <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a> --}}

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                                {{-- @can('view backend')
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                                @endcan --}}

                                {{-- <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a> --}}
                                <a href="{{ route('logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#" >
                                <img src=@php echo Auth::user()->avatar_path!=null ? Auth::user()->avatar_path : asset('assets/img-soc/avatar.svg') @endphp class="rounded mr-1" height="30px">{{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li> --}}
                    @endguest
                </ul>
            </div>
            </div>
        </nav>
    </div>
</header>

<div class="after-header"></div>

