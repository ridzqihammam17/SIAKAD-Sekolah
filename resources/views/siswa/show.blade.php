@extends('admin/admin_template')

@section('main')
<div id="index">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i><strong> {{ session('error') }}</strong>
    </div>
    @endif

    @if (session('sukses'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i><strong> {{ session('sukses') }}</strong>
    </div>
    @endif

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/' )}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('siswa' )}}">Siswa</a></li>
                        <li class="breadcrumb-item active">Detail Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image-->

                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (isset($siswa->foto))
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoupload/' . $siswa->foto) }}">
                                @else

                                @if ($siswa->jenis_kelamin == 'L')
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoupload/dummymale.png') }}" alt="">
                                @else ($siswa->jenis_kelamin == 'P')
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoupload/dummyfemale.png') }}" alt="">
                                @endif

                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{ $siswa->nama_siswa }}</h3>

                            <p class="text-muted text-center">Data Nilai</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                @foreach($siswa->pelajaran as $mapel)
                                <li class="list-group-item">
                                    <a href="/siswa/{{ $siswa->id }}/{{ $mapel->id }}/deletenilai" class="btn btn-sm btn-danger"><i  class="fas fa-trash"></i></a><b> {{ $mapel->nama_pelajaran }}</b> <a class="float-right" data-toggle="modal" data-target="#editmodal">{{ $mapel->pivot->nilai }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group">
                                <a href="{{ url('siswa/'.$siswa->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                            </div>
                            <div class="btn-group" role="group">
                                {!! Form::model($siswa, ['method'=>'DELETE', 'class' => 'delete', 'action'=>['SiswaController@destroy', $siswa->id]]) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                                {!! Form::close() !!}
                            </div>
                            <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i> Tambah Nilai</a>
                            </button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ url('siswa') }}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-8">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Profile Siswa</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <label class="col-sm-2">NISN</label>
                                <div class="col-sm-6">
                                    {{ $siswa->nisn }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Nama</label>
                                <div class="col-sm-6">
                                    {{ $siswa->nama_siswa }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Kelas</label>
                                <div class="col-sm-6">
                                    {{ $siswa->kelas->nama_kelas }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Ekskul</label>
                                <div class="col-sm-10">
                                    {{ $siswa->ekskul->nama_ekskul }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Tanggal lahir</label>
                                <div class="col-sm-10">
                                    {{ $siswa->tanggal_lahir->format('d-m-Y') }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Jenis Kelamin</label>
                                @if ($siswa->jenis_kelamin == 'L')
                                <div class="col-sm-10">Laki - laki</div>
                                @else ($siswa->jenis_kelamin == 'P')
                                <div class="col-sm-10">Perempuan</div>
                                @endif
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Telepon</label>
                                <div class="col-sm-10">
                                    {{ !empty($siswa->telepon->nomor_telepon) ? 
                                            $siswa->telepon->nomor_telepon : '-' }}
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2">Alamat</label>
                                <div class="col-sm-10">
                                    {{ $siswa->alamat }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Nilai Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/{{ $siswa->id }}/addnilai" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="pelajaran">Mata Pelajaran</label>
                            <select class="form-control" id="pelajaran" name="pelajaran">
                                @foreach($matapelajaran as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nilai</label>
                            <input name="nilai" type="number" class="form-control" placeholder="Nilai" value="{{ old('nilai') }}" required="required">
                            @if($errors->has('nilai'))
                            <span class="help-block">{{ $errors->first('nilai') }}</span>
                            @endif
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@stop