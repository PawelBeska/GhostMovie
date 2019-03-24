<div class="navbar-container container-fluid">
    <div>
        <ul class="nav-left">
            <li>
                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
            </li>
            <li>
                <a href="#!" onclick="javascript:toggleFullScreen()"><i class="ti-fullscreen"></i></a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="header-notification">
                <a href="#!"><i class="ti-bell"></i></a>
                <ul class="show-notification user-notification">
                    <li>
                        <h6>Powiadomienia</h6>
                        <label class="label label-danger">New</label>
                    </li>
                </ul>
            </li>
            <li class="user-profile header-notification">
                <a href="#!">
                    <span>{{auth()->user()->name}}</span>
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="show-notification profile-notification">
                    <li>
                        <a href="{{route('admin.index')}}"><i class="fa fa-home"></i> Strona główna</a>
                    </li>
                    <li>
                        <a href="{{route('home.logout')}}"><i class="fa fa-sign-out"></i> Wyloguj</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<script>
  </script>