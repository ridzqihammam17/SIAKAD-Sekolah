@extends('admin/admin_template')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!--Card Dashboard Info-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang!</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-danger">New</span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="callout callout-info bg-info">
                    <h5><i class="fas fa-bullhorn"></i> Selamat Datang didalam Sistem Informasi Akademik Terpadu SMP Unggul Jaya. </h5>

                    <p>SIAKAD ini digunakan untuk mendukung proses akademik didalam kegiatan pendidikan di SMP Unggul Jaya.
                SIAKAD ini didukung dengan teknologi berbasis WEB dan terintegrasi sehingga memudahkan untuk mengelola data akademik di Sekolah SMP Unggul Jaya</p>
                </div>
                
            </div>
            <!-- /.card-body -->
        </div>

        <!-- Informasi-->
        <h5 class="mb-2">Informasi Data</h5>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="far fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Siswa</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Guru</span>
                        <span class="info-box-number">40</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-gray-dark"><i class="fas fa-table"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Ekskul</span>
                        <span class="info-box-number">13,648</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-table"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kelas</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@stop