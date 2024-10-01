<div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigatio-lavel">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">

        <li class="{{ Request::is('/user') ? 'active' : '' }}">
            <a href="{{ url('/user') }}">
                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>


        <li class="pcoded-hasmenu {{ Request::is('useradding') ? 'active pcoded-trigger' : '' }}">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                <span class="pcoded-mtext">Task Management</span>

            </a>
            <ul class="pcoded-submenu">

                <li class="{{ Request::is('listTask') ? 'active' : '' }}">
                    <a href="{{ url('/AlllistTask') }}">
                        <span class="pcoded-mtext">All Task List </span>
                    </a>
                </li>
                <li class="{{ Request::is('listTask') ? 'active' : '' }}">
                    <a href="{{ url('/listTask') }}">
                        <span class="pcoded-mtext">My Task List </span>
                    </a>
                </li>
                <li class="{{ Request::is('addtask') ? 'active' : '' }}">
                    <a href="{{ url('/addtask') }}">
                        <span class="pcoded-mtext">Add New Task</span>
                    </a>
                </li>


            </ul>
        </li>

    </ul>


</div>
