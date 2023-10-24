<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="{{ route('dashboard') }}"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('assets/images/avatar-blank.jpg') }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ auth()->user()->name }}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"><i class="ti-user"></i>View Profile</a>
                        <a href="#"><i class="ti-settings"></i>Settings</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-light"><i
                                    class="ti-layout-sidebar-left"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-envelope"></i><b>SC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form.surat_cuti.create">Create Surat Cuti</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Features
        </div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-envelope"></i><b>SC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form.surat_cuti">Surat Cuti</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-folder"></i><b>Ar</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form.archive">Archive</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label" data-i18n="nav.category.setting">Setting
        </div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>US</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.setting.user">Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-stamp"></i><b>AP</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.setting.approval">Approval</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('role.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-settings"></i><b>RL</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.setting.role">Role</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
