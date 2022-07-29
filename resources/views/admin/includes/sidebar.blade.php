<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="{{ asset('admin/images/avatar.jpg') }}" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li>
                            <a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="mdi-action-settings"></i> Settings</a>
                        </li>
                        <li>
                            <a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                        </li>
                        <li>
                            <a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#"
                        data-activates="profile-dropdown">
                        John Doe<i class="mdi-navigation-arrow-drop-down right"></i>
                    </a>
                    <p class="user-roal">Administrator</p>
                </div>
            </div>
        </li>
        <li class="bold {{ request()->is('admin/index') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-cyan">
                <i class="mdi-action-dashboard"></i>
                Dashboard
            </a>
        </li>
        <li
            class="bold {{ request()->is('admin/color') ? 'active' : '' }}
            {{ request()->is('admin/color/create') ? 'active' : '' }}
            {{ request()->is('admin/color/*/edit') ? 'active' : '' }}
            ">
            <a href="{{ route('admin.color.index') }}" class="waves-effect waves-cyan">
                <i class="fa-solid fa-palette"></i>
                Color
            </a>
        </li>
        <li
            class="bold {{ request()->is('admin/supplier') ? 'active' : '' }}
            {{ request()->is('admin/supplier/create') ? 'active' : '' }}
            {{ request()->is('admin/supplier/*/edit') ? 'active' : '' }}
            ">
            <a href="{{ route('admin.supplier.index') }}" class="waves-effect waves-cyan">
                <i class="fa-solid fa-person-carry-box"></i>
                Supplier
            </a>
        </li>

        {{-- <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i>
                        Layouts
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="layout-fullscreen.html">Full Screen</a>
                            </li>
                            <li>
                                <a href="layout-horizontal-menu.html">Horizontal Menu</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li> --}}
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan">
        <i class="mdi-navigation-menu"></i>
    </a>
</aside>
