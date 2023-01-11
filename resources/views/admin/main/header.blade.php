<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link js-push-menu-butt" data-widget="pushmenu" href="javascript:void(0);" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle js--custom-dropdown">
                <img src="{{ asset('/admin/img/avatar.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg ">
                <li class="user-header">
                    <img src="{{ asset('/admin/img/avatar.png') }}" class="img-circle" alt="User Image">
                    <p>
                        {{ Auth::user()->name }}
                    </p>
                </li>
                <li class="user-footer">
                    <div class="float-right">
                        <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-flat">Вийти</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
