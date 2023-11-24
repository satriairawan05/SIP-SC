@php
    $scCreate = null;
    $scRead = null;
    $scArchive = null;
    $scUser = null;
    $scCuti = null;
    $scDepartemen = null;
    $scApproval = null;

    $pages = \App\Models\User::leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        ->where('group_pages.access', '=', 1)
        ->where('group_pages.group_id', '=', auth()->user()->group_id)
        ->select(['group_pages.access', 'pages.page_name', 'pages.action'])
        ->get();

    foreach ($pages as $r) {
        if ($r->page_name == 'Surat Cuti') {
            if ($r->action == 'Create') {
                $scCreate = $r->access;
            }

            if ($r->action == 'Read') {
                $scRead = $r->access;
            }
        }

        if ($r->page_name == 'Archive') {
            if ($r->action == 'Read') {
                $scArchive = $r->access;
            }
        }

        if ($r->page_name == 'User') {
            if ($r->action == 'Read') {
                $scUser = $r->access;
            }
        }

        if ($r->page_name == 'Cuti') {
            if ($r->action == 'Read') {
                $scCuti = $r->access;
            }
        }

        if ($r->page_name == 'Departemen') {
            if ($r->action == 'Read') {
                $scDepartemen = $r->access;
            }
        }

        if ($r->page_name == 'Approval') {
            if ($r->action == 'Read') {
                $scApproval = $r->access;
            }
        }
    }
@endphp

<div>
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
                            <a href="#"><i class="ti-settings"></i>Settings</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-light border-0 bg-transparent"><i
                                        class="ti-layout-sidebar-left"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Home</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Registration</div>
            @if ($scCreate == 1)
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ Request::is('surat_cuti/create') ? 'active' : '' }}">
                        <a href="{{ route('surat_cuti.create') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-envelope"></i><b>SC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form.surat_cuti.create">Surat Cuti</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            @endif
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Bank File
            </div>
            <ul class="pcoded-item pcoded-left-item">
                @if ($scRead)
                    <li class="{{ Request::is('surat_cuti*') ? 'active' : '' }}">
                        <a href="{{ route('surat_cuti.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-envelope"></i><b>SC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form.surat_cuti">Surat Cuti</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
                @if ($scArchive == 1)
                    <li class="{{ Request::is('archive*') ? 'active' : '' }}">
                        <a href="{{ route('archive') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-folder"></i><b>Ar</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form.archive">Archive</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.setting">Setting
            </div>
            <ul class="pcoded-item pcoded-left-item">
                @if ($scUser == 1)
                    <li class="{{ Request::is('user*') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>US</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.setting.user">Users</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
                @if ($scCuti == 1)
                    <li class="{{ Request::is('cuti*') ? 'active' : '' }}">
                        <a href="{{ route('cuti.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-agenda"></i><b>CT</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form.surat_cuti">Cuti</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
                @if ($scDepartemen == 1)
                    <li class="{{ Request::is('departemen*') ? 'active' : '' }}">
                        <a href="{{ route('departemen.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>DPT</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.setting.departemen">Departemen</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
                @if ($scApproval == 1)
                    <li class="{{ Request::is('approval*') ? 'active' : '' }}">
                        <a href="{{ route('approval.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-stamp"></i><b>AP</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.setting.approval">Approval</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->group_id == 1)
                    <li class="{{ Request::is('role*') ? 'active' : '' }}">
                        <a href="{{ route('role.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-settings"></i><b>RL</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.setting.role">Role</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.version"></div>
    </nav>
</div>
