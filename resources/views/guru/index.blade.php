@extends('admin/admin_template')

@section('main')
<div id="index">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/' )}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Guru</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <form class="form-inline" action="/guru" method="GET">
                <div class="input-group">
                    <input class="form-control" type="text" name="cari" placeholder="Cari.." aria-label="Search" value="{{ old('cari') }}">
                    <div class="input-group-append">
                        <button class="btn bg-info" type="submit" value="CARI">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Data Guru</h3>
                        </div>
                        @if (!empty($guru_list))
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead class="">
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru_list as $guru)
                                    <tr>
                                        <td>{{ $guru->nip }}</td>
                                        <td>{{ $guru->nama_guru }}</td>
                                        <td>{{ $guru->pelajaran->nama_pelajaran }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="guru/{{$guru->id}}" class="btn btn-success btn-sm btn-icon icon-left"><i class="fas fa-eye"></i></a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <a href="guru/{{$guru->id}}/edit" class="btn btn-info btn-sm btn-icon icon-left"><i class="fas fa-pen"></i></a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                {!! Form::model($guru, ['method'=>'DELETE', 'class' => 'delete', 'action'=>['GuruController@destroy', $guru->id]]) !!}
                                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @else
                            <p>Tidak ada data guru</p>
                            @endif
                        </div>
                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm m-0 float-left">
                                <strong>Jumlah Data: {{ $jumlah_guru }}</strong>
                            </div>
                            <div class="pagination pagination-sm m-0 float-right">
                                {{ $guru_list->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tombol-nav">
                <div>
                    <a href="{{ url('guru/create' )}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Guru</a>
                </div>
            </div>

        </div>
    </section>
</div>
@stop