@extends('admin/admin_template')

@section('main')
<div id="index">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/' )}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <form class="form-inline" action="/siswa" method="GET">
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
                    @if (!empty($siswa_list))
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Data Siswa</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead class="">
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tanggal lahir</th>
                                        <th>Kelamin</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa_list as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nisn }}</td>
                                        <td>{{ $siswa->nama_siswa }}</td>
                                        <td>{{ $siswa->kelas->nama_kelas }}</td>
                                        <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ !empty($siswa->telepon->nomor_telepon) ? 
                                            $siswa->telepon->nomor_telepon : '-' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="siswa/{{$siswa->id}}" class="btn btn-success btn-sm btn-icon icon-left"><i class="fas fa-eye"></i></a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <a href="siswa/{{$siswa->id}}/edit" class="btn btn-info btn-sm btn-icon icon-left"><i class="fas fa-pen"></i></a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                {!! Form::model($siswa, ['method'=>'DELETE', 'class' => 'delete', 'action'=>['SiswaController@destroy', $siswa->id]]) !!}
                                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>

                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm m-0 float-left">
                                <strong>Jumlah Data: {{ $jumlah_siswa }}</strong>
                            </div>
                            <div class="pagination pagination-sm m-0 float-right">
                                {{ $siswa_list->links() }}
                            </div>
                        </div>
                    </div>
                    @else
                    <h1>Tidak ada data mahasiswa</h1>
                    @endif
                </div>
            </div>


            <div class="tombol-nav">
                <div>
                    <a href="{{ url('siswa/create' )}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Siswa</a>
                </div>
            </div>

        </div>
    </section>
</div>
@stop