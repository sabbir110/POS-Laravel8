@php
// $prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->user_type == 'admin')
            <li class="nav-item {{ Request::is('users*') ? 'menu-open ' : '' }}">
                <a href="#" class="nav-link"><i class="far fa-user"></i>
                    <p>Manage User</p>
                </a>
                <ul class="nav nav-treeview pl-2 ">
                    <li class="nav-item">
                        <a href="{{ route('user.view') }}" class="nav-link {{ $route === 'user.view' ? 'active' : '' }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View User</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview pl-2">
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
        <li class="nav-item {{ Request::is('Profiles*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link"><i class="far fa-address-card"></i>
                <p>Manage Profile</p>
            </a>
            <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                    <a href="{{ route('profiles.view') }}"
                        class="nav-link {{ $route === 'profiles.view' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                    <a href="{{ route('profiles.change_password') }}"
                        class="nav-link {{ $route === 'profiles.change_password' ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{ Request::is('supplier*') ? 'menu-open ' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Manage Supplier</p>
            </a>
            <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link {{ $route === 'supplier.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supplier List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                    <a href="{{ route('supplier.create') }}"
                        class="nav-link {{ $route === 'supplier.create' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Supplier</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
