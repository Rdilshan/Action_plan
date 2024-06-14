<div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigatio-lavel">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">

        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}">
                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>

        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                <span class="pcoded-mtext">Goal Management</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{ url('/viewblog') }}">
                        <span class="pcoded-mtext">View Goal</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="form-elements-add-on.htm">
                        <span class="pcoded-mtext">Create Goal</span>
                    </a>
                </li>
                {{-- <li class=" ">
                    <a href="form-elements-advance.htm">
                        <span class="pcoded-mtext">Form-Elements-Advance</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="form-validation.htm">
                        <span class="pcoded-mtext">Form Validation</span>
                    </a>
                </li> --}}
            </ul>
        </li>


        <li class="pcoded-hasmenu {{ Request::is('useradding') ? 'active pcoded-trigger' : '' }}">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                <span class="pcoded-mtext">User Management</span>

            </a>
            <ul class="pcoded-submenu">

                {{-- <li class=" pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-mtext">Vertical</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="menu-static.htm">
                                <span class="pcoded-mtext">Static Layout</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="menu-header-fixed.htm">
                                <span class="pcoded-mtext">Header Fixed</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="menu-compact.htm">
                                <span class="pcoded-mtext">Compact</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="menu-sidebar.htm">
                                <span class="pcoded-mtext">Sidebar Fixed</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-mtext">Horizontal</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="menu-horizontal-static.htm" target="_blank">
                                <span class="pcoded-mtext">Static Layout</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="menu-horizontal-fixed.htm" target="_blank">
                                <span class="pcoded-mtext">Fixed layout</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="menu-horizontal-icon.htm" target="_blank">
                                <span class="pcoded-mtext">Static With Icon</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="menu-horizontal-icon-fixed.htm" target="_blank">
                                <span class="pcoded-mtext">Fixed With Icon</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="{{ Request::is('useradding') ? 'active' : '' }}">
                    <a href="{{ url('/useradding') }}">
                        <span class="pcoded-mtext">Adding User</span>
                    </a>
                </li>
                {{-- <li class=" ">
                    <a href="box-layout.htm" target="_blank">
                        <span class="pcoded-mtext">Box Layout</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="menu-rtl.htm" target="_blank">
                        <span class="pcoded-mtext">RTL</span>
                    </a>
                </li> --}}
            </ul>
        </li>
        <li class="{{ Request::is('test') ? 'active' : '' }}">
            <a href="{{ url('/test') }}">
                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                <span class="pcoded-mtext">Navigation</span>
            </a>
        </li>

    </ul>


</div>
