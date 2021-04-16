<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard.index') }}">
            <span class="align-middle me-3">{{ env("APP_NAME") }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                General
            </li>
            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="list"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('dashboard/cards/*') ? 'active' : '' }} {{ request()->is('dashboard/cards') ? 'active' : '' }}">
                <a data-target="#products" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="grid"></i>
                    <span class="align-middle">Products</span>
                </a>
                <ul id="products" class="sidebar-dropdown list-unstyled collapse {{ request()->is('dashboard/cards/*') ? 'show' : '' }}" data-parent="#sidebar">

                        <li class="sidebar-item {{ request()->is('dashboard/cards/create') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('products.index')  }}">All Products</a>
                        </li>

                    <li class="sidebar-item {{ request()->is('dashboard/cards/check') ? 'active' : '' }} {{ request()->is('dashboard/cards/show') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{  route('products.create')  }}">Add new product</a>
                    </li>
                </ul>
            </li>
            </li>

            <li class="sidebar-header">
                Personal
            </li>
            <li class="sidebar-item {{ request()->is('dashboard/profile') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('profile.index', 'account') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
