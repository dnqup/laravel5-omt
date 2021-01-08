<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('post.list') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Bài viết</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.list') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('role.list') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Vai trò ( Role)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permission.list') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Permission</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
