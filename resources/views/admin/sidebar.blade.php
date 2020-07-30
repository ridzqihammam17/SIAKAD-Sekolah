<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link bg-navy">
        <img src="{{ asset('asset/logo_navbar.png') }}" alt="Logo SIAKAD" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text">ADMIN SIAKAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/' )}}" class="nav-link @if (Request::is('/')) { active bg-success } @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>

                </li>
                <li class="nav-item has-treeview @if (Request::segment(1) == 'siswa') { menu-open } @endif} @if (Request::segment(1) == 'guru') { menu-open } @endif} @if (Request::segment(1) == 'kelas') { menu-open } @endif} @if (Request::segment(1) == 'ekskul') { menu-open } @endif} @if (Request::segment(1) == 'pelajaran') { menu-open } @endif}">
                    <a href="{{ url('/' )}}" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('siswa' )}}" class="nav-link @if (Request::segment(1) == 'siswa') { active bg-success } @endif}">
                                <i class="far fa-user nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('guru') }}" class="nav-link @if (Request::segment(1) == 'guru') { active bg-success } @endif}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('kelas' )}}" class="nav-link @if (Request::segment(1) == 'kelas') { active bg-success } @endif}">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('ekskul') }}" class="nav-link @if (Request::segment(1) == 'ekskul') { active bg-success } @endif}">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Ekskul</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pelajaran') }}" class="nav-link @if (Request::segment(1) == 'pelajaran') { active bg-success } @endif}">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('about') }}" class="nav-link @if (Request::segment(1) == 'about') { active bg-success } @endif}">
                        <i class="nav-icon fas fa-info"></i>
                        <p>About</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>