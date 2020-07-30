@extends('admin/admin_template')

@section('main')
<div id="index">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ekskul</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/' )}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ekskul</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Ekskul</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ action('EkskulController@store') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Ekskul</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_ekskul" class="form-control" required="required" id="" placeholder="Nama Ekskul">
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-sm btn-primary float-right">
                        </div>
                        </form>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-8">
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Data Ekskul</h3>
                        </div>
                        @if (!empty($ekskul_list))
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover text-nowrap">
                                <thead class="">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Ekskul</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ekskul_list as $ekskul)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ekskul->nama_ekskul}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="card-body">
                            Tidak ada data ekskul, buat dahulu
                        </div>
                        @endif

                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm m-0 float-left">
                                <strong>Jumlah Data: {{ $jumlah_ekskul }}</strong>
                            </div>
                            <div class="pagination pagination-sm m-0 float-right">
                                {{ $ekskul_list->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
@stop