<nav class="main-header navbar navbar-expand navbar-navy navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Sistem Informasi Akademik Terpadu SMP Unggul Jaya</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-sm-inline-block dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" width="30" height="30" alt="User Image"> {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right bg-danger">
                <a class="dropdown-item bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">About</a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
        </li> -->
    </ul>

</nav>