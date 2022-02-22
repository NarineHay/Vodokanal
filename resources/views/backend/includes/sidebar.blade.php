<div class="sidebar user-sidebar pt-4">
    <nav class="sidebar-nav user-sidebar-nav ps">
        <ul class="nav">
            <li class="nav-title ">
                <div class="account-name">Имя Фамилия Отчество 111111111</div>
               <div>Пассивный статус</div>
            </li>


            <li class="nav-item">
                <a class="nav-link  {{ request()->is('admin/email-templates') ? 'active' : ''
                    }}" href="http://localhost:8000/admin/pages">
                    <i class="nav-icon bi bi-truck"></i>
                    <span class="li-title">Машины</span>

                    <div>
                        <span class=" ft-size-14">Камаз 1</span>
                        <span class="ml-2 ft-size-14"> X111 XX 116</span>
                    </div>
                    <div>
                        <span class=" ft-size-14">Камаз 1</span>
                        <span class="ml-2 ft-size-14"> X111 XX 116</span>
                    </div>
                </a>
            </li>
            <li><hr width="70%" class="ml-3"></li>

            <li class="nav-item">
                <a class="nav-link  {{ request()->is('backend.support') ? 'active' : ''
                    }}" href="{{ route('backend.support') }}">
                    <i class="nav-icon bi bi-headset"></i>
                    <span class="li-title">Служба поддержки</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Выйти') }}
                </a>

            </li>
        </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
