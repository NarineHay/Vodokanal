<header>
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
                        <a href="{{route('contact')}}" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }}">Тарифы</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }}">О нас</a>
                    </li>

                </ul>
                <ul class="navbar-nav d-flex justify-content-center reg" >
                    @auth
                        @if (Request::is(['backend*','dashboard']))
                            <li class="nav-item ">
                                <a href="#" class="fio nav-link text-white {{ request()->is(['user.dashboard', 'user.support']) ? 'active' : '' }}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ФИО</a>
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
                </ul>
            </div>
            </div>
        </nav>
    </div>
</header>
<div class="after-header"></div>
