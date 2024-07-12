            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    
                <!-- include main-sidebar-header -->
                @include('Dashboard.Layouts.sidebarheader')

                <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="/" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
    
                <!-- Layouts -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pages</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Account Settings</div>
                    </a>
                    <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route('admin.Categories.index')}}" class="menu-link">
                        <div data-i18n="Account">Categories</div>
                        </a>
                    </li>
    
                    <li class="menu-item">
                        <a href="{{route('admin.Products.index')}}" class="menu-link">
                        <div data-i18n="Account">Products</div>
                        </a>
                    </li>
    
                    </ul>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Stores</span>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Store Account</div>
                    </a>
                    <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route('admin.Stores.index')}}" class="menu-link">
                        <div data-i18n="Account">Store</div>
                        </a>
                    </li>
    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                        <div data-i18n="Account">testing</div>
                        </a>
                    </li>
    
                    </ul>
                </li>

                </ul>
            </aside>
            <!-- / Menu -->
    
        <!-- / Layout wrapper -->
    