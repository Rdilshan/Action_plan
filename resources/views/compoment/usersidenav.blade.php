<div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigatio-lavel">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">

        <li class="{{ Request::is('/user') ? 'active' : '' }}">
            <a href="{{ url('/user') }}">
                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>

        <li class="{{ Request::is('test') ? 'active' : '' }}">
            <a href="{{ url('/test') }}">
                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                <span class="pcoded-mtext">Navigation</span>
            </a>
        </li>

    </ul>


</div>
