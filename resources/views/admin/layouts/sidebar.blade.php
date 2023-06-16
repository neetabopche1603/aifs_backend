<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{asset('assets/images/avatar-4.jpg')}}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">John Doe<i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                </div>
            </form>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{Request::is('admin/dashboard') ? 'active':''}}">
                <a href="{{url('admin/dashboard')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Agent Module</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu {{Request::is('admin/agent*') ? 'active pcoded-trigger':''}}">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>AM</b></span>
                    <span class="pcoded-mtext">Agent Module</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{Request::is('admin/agent') ? 'active':''}} ">
                        <a href="{{url('admin/agent')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Agent</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin/agent/assignedLead*') ? 'active':''}}">
                        <a href="{{url('admin/agent/assignedLead')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Assigned Lead's</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        
        <div class="pcoded-navigation-label">Loan Category</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{Request::is('admin/category') ? 'active':''}}">
                <a href="{{url('admin/category')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Category</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
<!-- 
        <div class="pcoded-navigation-label">Agent Module</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{url('basic/agent')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
                    <span class="pcoded-mtext">Agent</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> -->

            <div class="pcoded-navigation-label">Lead's Module</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{Request::is('user') ? 'active':''}}">
                    <a href="{{url('user')}}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-receipt"></i><b>B</b></span>
                        <span class="pcoded-mtext">Lead's</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <!-- <li class="">
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-map-alt"></i><b>M</b></span>
                    <span class="pcoded-mtext">Maps</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> -->
        </ul>

    </div>
</nav>