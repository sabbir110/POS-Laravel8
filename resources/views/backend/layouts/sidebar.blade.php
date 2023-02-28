@php
// $prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$menu_open = 'menu-open  bg-dark rounded';
@endphp
<nav class="mt-3">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">DASHBOARD</li>
        @if (Auth::user()->user_type == 'admin')
            <li class="nav-item  {{ Request::is('users*') ? $menu_open : '' }}">
                <a href="#" class="nav-link {{ Request::is('users*') ? 'bg-primary' : '' }}"><i class="far fa-user"></i>
                    <p>Manage User<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item">
                        <a href="{{ route('user.view') }}" class="nav-link {{ $route === 'user.view' ? 'text-light' : '' }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View User</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.create') }}"
                            class="nav-link {{ $route === 'user.create' ? 'text-light' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create User</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="nav-item mt-2 {{ Request::is('Profiles*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('Profiles*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i>
                <p>Manage Profile<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.view') }}"
                        class="nav-link {{ $route === 'profiles.view' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.change_password') }}"
                        class="nav-link {{ $route === 'profiles.change_password' ? 'text-light' : '' }}"><i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('supplier*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('supplier*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i>
                <p>Manage Supplier<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link {{ $route === 'supplier.index' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supplier List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('supplier.create') }}"
                        class="nav-link {{ $route === 'supplier.create' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Supplier</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('customer*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('customer*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i> <p>Manage Customer<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}"
                        class="nav-link {{ $route === 'customer.index' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Customer List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customer.create') }}"
                        class="nav-link {{ $route === 'customer.create' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Customer</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('unit*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('unit*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i> <p>Manage Unit<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('unit.index') }}"
                        class="nav-link {{ $route === 'unit.index' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Unit List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('unit.create') }}"
                        class="nav-link {{ $route === 'unit.create' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Unit</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('category*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('category*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i> <p>Manage Category<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ $route === 'category.index' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Category List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.create') }}"
                        class="nav-link {{ $route === 'category.create' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Category</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('product*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('product*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i> <p>Manage Product<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ $route === 'product.index' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Product List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('product.create') }}"
                        class="nav-link {{ $route === 'product.create' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Product</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('purchase*') ? $menu_open : '' }}">
            <a href="#" class="nav-link {{ Request::is('purchase*') ? 'bg-primary' : '' }}"><i class="far fa-address-card"></i> <p>Manage Purchase<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('purchase.index') }}"
                        class="nav-link {{ $route === 'purchase.index' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Purchase List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('purchase.create') }}"
                        class="nav-link {{ $route === 'purchase.create' ? 'text-light' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Purchase</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
