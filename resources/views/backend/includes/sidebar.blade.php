<div class="sidebar user-sidebar pt-4">
    <nav class="sidebar-nav user-sidebar-nav ps">
        <ul class="nav">

            <li class="nav-item nav-dropdown {{ request()->routeIs(['roles*', 'administration*', 'backend.support*', 'backend.*feedback*']) ? 'open' : '' }}">
                <a class="nav-link nav-dropdown-toggle " href="#"> Система </a>

                <ul class="nav-dropdown-items ">
                    {{-- @can('administration-list') --}}
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('administration*') ? 'active' : '' }}" href="{{ route('administration.index') }}">
                                Список администраторов
                            </a>
                        </li>
                    {{-- @endcan --}}
                    @can('role-list')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                                Управление ролями
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a class="nav-link " href="">
                            Отчеты и статистика
                         </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.support*') ? 'active' : '' }}" href="{{route('backend.support_task_index')}}">
                            Служба поддержки
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.*feedback*') ? 'active' : '' }}" href="{{route('backend.feedback_index')}}">
                         Обратная связь
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ request()->routeIs(['backend.main_home_page', 'backend.about_as', 'backend.main_activities', 'backend.main_activities2', 'backend.tariff_details', 'backend.payment_method', 'backend.create', 'backend.company_details']) ? 'open' : '' }}">
                <a class="nav-link nav-dropdown-toggle " href="#"> Домашняя страница </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.main_home_page') ? 'active' : '' }}" href="{{route('backend.main_home_page')}}">
                            Баннер
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.about_as') ? 'active' : '' }}" href="{{ route('backend.about_as') }}">
                            О нашей компании
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.main_activities') ? 'active' : '' }}" href="{{ route('backend.main_activities')}}">
                            Основные виды деятельности предприятия первый
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.main_activities2') ? 'active' : '' }}" href="{{ route('backend.main_activities2')}}">
                            Основные виды деятельности предприятия второй
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.tariff_details') ? 'active' : '' }}" href="{{route('backend.tariff_details')}}">
                            Детали тарифа
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.payment_method') ? 'active' : '' }}" href="{{route('backend.payment_method')}}">
                            Способы оплаты
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.company_details') ? 'active' : '' }}" href="{{route('backend.company_details')}}">
                            Реквизиты компании
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.company_details') ? 'active' : '' }}" href="{{route('backend.contact_footer')}}">
                            Контакты
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-item nav-dropdown {{ request()->routeIs(['users*', 'backend.*contract*', 'backend.*Contract*', 'backend.createcard1*', '*balance*']) ? 'open' : '' }}" >
                <a class="nav-link nav-dropdown-toggle " href="#"> Пользователи </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs(['backend.*contract*', 'backend.*Contract*']) ? 'active' : '' }}" href="{{route('backend.contract_page')}}">
                            Договор
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('backend.createcard_user') ? 'active' : '' }}"  href="{{ route('backend.createcard_user') }}">
                        Добавить карту
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('backend.card') }}">
                        Карта
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                            Список зарегистрированных
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.addbalance') ? 'active' : '' }}"  href="{{ route('backend.addbalance') }}">
                            Пополнение баланса
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.checkbalance') ? 'active' : '' }}" href="{{ route('backend.checkbalance') }}">
                            Проверка баланса
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ request()->routeIs(['backend.*terminal*', 'backend.map']) ? 'open' : '' }}">
                <a class="nav-link nav-dropdown-toggle " href="#"> Терминалы </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.info_terminal') ? 'active' : '' }}" href="{{route('backend.info_terminal')}}">
                            Инфо по терминалам
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backend.safeti') ? 'active' : '' }}"  href="{{ route('backend.safeti') }}">
                          Система безопасности
                        </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('backend.map') ? 'active' : '' }}"  href="{{ route('backend.map') }}">
                            Карты
                         </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Выйти') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
