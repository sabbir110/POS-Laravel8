@php
// $prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<nav class="mt-3">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->user_type == 'admin')
            <li class="nav-item {{ Request::is('users*') ? 'menu-open ' : '' }}">
                <a href="#" class="nav-link {{ Request::is('users*') ? 'bg-primary' : 'bg-secondary' }}"><i class="far fa-user"></i>
                    <p>Manage User</p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item">
                        <a href="{{ route('user.view') }}" class="nav-link {{ $route === 'user.view' ? 'active' : '' }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View User</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.create') }}"
                            class="nav-link {{ $route === 'user.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create User</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="nav-item mt-2 {{ Request::is('Profiles*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link {{ Request::is('Profiles*') ? 'bg-primary' : 'bg-secondary' }}"><i class="far fa-address-card"></i>
                <p>Manage Profile</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.view') }}"
                        class="nav-link {{ $route === 'profiles.view' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.change_password') }}"
                        class="nav-link {{ $route === 'profiles.change_password' ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('supplier*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link {{ Request::is('supplier*') ? 'bg-primary' : 'bg-secondary' }}"><i class="nav-icon fas fa-copy"></i>
                <p>Manage Supplier</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link {{ $route === 'supplier.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supplier List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('supplier.create') }}"
                        class="nav-link {{ $route === 'supplier.create' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Supplier</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('customer*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link {{ Request::is('customer*') ? 'bg-primary' : 'bg-secondary' }}"><i class="nav-icon fas fa-copy"></i><p>Manage Customer</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}"
                        class="nav-link {{ $route === 'customer.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Customer List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customer.create') }}"
                        class="nav-link {{ $route === 'customer.create' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Customer</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('unit*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link {{ Request::is('unit*') ? 'bg-primary' : 'bg-secondary' }}"><i class="nav-icon fas fa-copy"></i><p>Manage Unit</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('unit.index') }}"
                        class="nav-link {{ $route === 'unit.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Unit List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('unit.create') }}"
                        class="nav-link {{ $route === 'unit.create' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Unit</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('category*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link {{ Request::is('category*') ? 'bg-primary' : 'bg-secondary' }}"><i class="nav-icon fas fa-copy"></i><p>Manage Category</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ $route === 'category.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Category List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.create') }}"
                        class="nav-link {{ $route === 'category.create' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Category</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-2 {{ Request::is('product*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link {{ Request::is('product*') ? 'bg-primary' : 'bg-secondary' }}"><i class="nav-icon fas fa-copy"></i><p>Manage Product</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ $route === 'product.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Product List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('product.create') }}"
                        class="nav-link {{ $route === 'product.create' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Product</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
