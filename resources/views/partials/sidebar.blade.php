<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <h2>SMK1SR</h2>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Berita Component</span>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link {{ request()->routeIs('kategori-berita.*') ? 'active' : '' }}"
                        href="{{ route('kategori-berita.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-category"></i>
                        </span>
                        <span class="hide-menu">Kategori Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                        href="{{ route('berita.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-news"></i>
                        </span>
                        <span class="hide-menu">Berita</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Gallery Component</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('videos.*') ? 'active' : '' }}"
                        href="{{ route('videos.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-video"></i>
                        </span>
                        <span class="hide-menu">Video</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('photo.*') ? 'active' : '' }}"
                        href="{{ route('photo.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-photo"></i>
                        </span>
                        <span class="hide-menu">Foto</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Other Component</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('profile') || request()->routeIs('history.*') || request()->routeIs('goals.*') ? 'active' : '' }}"
                        href="{{ route('profile') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout"></i>
                        </span>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('event.*') ? 'active' : '' }}"
                        href="{{ route('event.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-speakerphone"></i>
                        </span>
                        <span class="hide-menu">Event</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-messages"></i>
                        </span>
                        <span class="hide-menu">Chat</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
