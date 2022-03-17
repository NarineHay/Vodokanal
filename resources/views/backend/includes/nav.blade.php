<header class="nav_bar_color">
    <style>
        .navbar-expand-lg .navbar-collapse{
            justify-content: end;
        }
        .navbar-expand-lg .navbar-nav{
            justify-content: end !important;
        }
        .nav_link_link{
            border-right:2px solid black;
            margin: 0 0 0 0
        }
        .navbar-nav .nav-link{
            padding-right: 23px;
            padding-left: 10px;
        }
    </style>
    <div class="container">
        <nav class="navbar  navbar-expand-lg ">
            <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('assets/images/img_index/thumbnail 1.png')}}" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-around w-100 text-white">
                    <li class="nav-item">
                       <img style="color:black !important" class="nav-link text-white nav_link_link {{ request()->is('users*') ? 'active' : '' }}" src="{{asset('/assets/images/img_index/Vector.png')}}">
                    </li>
                    
                    {{-- <li class="nav-item">
                        <a href="{{route('contact')}}" style="color:black !important" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }}">О нас</a>
                    </li> --}}

                </ul>
                <ul class="navbar-nav d-flex justify-content-center reg" >
                   
                    @auth
                        @if (Request::is([]))
                            <li class="nav-item ">
                                <a href="#"  style="color:black !important" class="fio nav-link text-white {{ request()->is(['user.dashboard', 'user.support']) ? 'active' : '' }}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ФИО</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                              
                                <a class="fio nav-link dropdown-toggle text-white" style="color:black !important" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{{ Auth::user()->first_name }}}
                                </a>
                                <ul class="dropdown-menu dropdown-nav-ul" aria-labelledby="navbarDropdownMenuLink">
                                    <li>

                                        <a class="dropdown-item" href="{{ route('backend.dashboard') }}" >Профиль </a>

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
                </ul>
            </div>
            </div>
        </nav>
    </div>
</header>
<div class="after-header"></div>