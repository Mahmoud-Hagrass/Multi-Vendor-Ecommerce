<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" style="font-family: 'Tajawal', sans-serif;">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="font-family: 'Tajawal', sans-serif;">

            <!-- Dashboard -->
            <li class=" nav-item">
                <a href="{{ route('admin.index') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.home') }}</span>
                </a>
            </li>

            <!-- Roles & Permissions -->
            <li class=" nav-item">
                <a>
                    <i class="fas fa-user-shield"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.roles_permissions') }}</span>
                    <ul class="menu-content">
                        @can('role_create')
                            <li>
                                <a class="menu-item" href="{{ route('admin.roles.create') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.role_create') }}</a>
                            </li>
                        @endcan
                        @can('roles_all_list')
                            <li>
                                <a class="menu-item" href="{{ route('admin.roles.index') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.roles_all') }}</a>
                            </li>
                        @endcan
                    </ul>
                </a>
            </li>

            <!-- Admins -->
            <li class=" nav-item">
                <a>
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.admins') }}</span>
                    <ul class="menu-content">
                        @can('admin_create')
                            <li>
                                <a class="menu-item" href="{{ route('admin.admins.create') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.admin_create') }}</a>
                            </li>
                        @endcan
                        @can('admin_active_list' , App\Models\Admin::class)
                            <li>
                                <a class="menu-item" href="{{ route('admin.admins.index') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.admins_all') }}</a>
                            </li>
                        @endcan
                        @can('admin_inactive_list')
                            <li>
                                <a class="menu-item" href="{{ route('admin.admins.inactive') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.admins_inactive') }}</a>
                            </li>
                        @endcan
                    </ul>
                </a>
            </li>

            <!-- Shipping Management -->
            @can('government_shipping_management' , App\Models\Admin::class)
                <li class=" nav-item">
                    <a>
                        <i class="la la-truck"></i>
                        <span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.shipping_management') }}</span>
                        <ul class="menu-content">
                            <li>
                                <a class="menu-item" href="{{ route('admin.world.countries') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.countries_management') }}</a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{ route('admin.world.governments') }}" data-i18n="nav.page_layouts.1_column">{{ __('dashboard.governments_management') }}</a>
                            </li>
                        </ul>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</div>
