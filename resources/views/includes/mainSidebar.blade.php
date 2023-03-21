<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/images/logo.png') }}" class="brand-image  elevation-10" style="opacity: .8">
        <span class="brand-text font-weight-light">Golden Gym</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/images/user1.jpg') }}" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->name }} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header">Content Managment</li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list-alt"></i>
                        <p>
                            subscribers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('users') }}" class="nav-link">
                                <i class="fa fa-list"></i>
                                <p>Index</p>
                            </a>
                        </li>
                        @can('Create-User')
                            <li class="nav-item">
                                <a href="{{ route('user.create') }}" class="nav-link">
                                    <i class="fa fa-plus-square"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>




                <li class="nav-header">Role and Permission Managment</li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list-alt"></i>
                        <p>
                            Role
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="fa fa-list"></i>
                                <p>Index</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}" class="nav-link">
                                <i class="fa fa-plus-square"></i>
                                <p>Create</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list-alt"></i>
                        <p>
                            Permissons
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="fa fa-list"></i>
                                <p>Index</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.create') }}" class="nav-link">
                                <i class="fa fa-plus-square"></i>
                                <p>Create</p>
                            </a>
                        </li>


                    </ul>
                </li>



                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-edit"></i>
                        <p>Edit Profile</p>
                    </a>

                </li>
                <i class="fa fa-sign-out" aria-hidden="true"></i>

                <li class="nav-item">
                    <a href="{{ route('cms.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>logout</p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
