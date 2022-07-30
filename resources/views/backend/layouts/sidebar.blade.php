<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Manage User</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('user.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View User</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('user.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create User</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Manage Profile</p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('user.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
