@extends('admin/admin_template')

@section('main')
<div id="index">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/' )}}">Dashbaord</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('guru' )}}">Guru</a></li>
                        <li class="breadcrumb-item active">Detail Guru</li>
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
                                @if (isset($guru->foto))
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoupload/' . $guru->foto) }}">
                                @else

                                @if ($guru->jenis_kelamin == 'L')
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoupload/dummymale.png') }}" alt="">
                                @else ($guru->jenis_kelamin == 'P')
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoupload/dummyfemale.png') }}" alt="">
                                @endif

                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{ $guru->nama_guru }}</h3>

                            <p class="text-muted text-center">Profil Singkat</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIP</b> <a class="float-right">{{ $guru->nip }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mata Pelajaran</b> <a class="float-right">{{ $guru->pelajaran->nama_pelajaran }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal Lahir</b> <a class="float-right">{{ $guru->tanggal_lahir->format('d-m-Y') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group">
                                <a href="{{ url('guru/'.$guru->id.'/edit') }}" class="btn btn-info btn-sm btn-icon icon-left"><i class="fas fa-pen"></i></a>
                            </div>
                            <div class="btn-group" role="group">
                                {!! Form::model($guru, ['method'=>'DELETE', 'class' => 'delete', 'action'=>['GuruController@destroy', $guru->id]]) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ url('guru') }}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Profile Guru</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <label class="col-sm-2">NIP</label>
                                <div class="col-sm-10">
                                    {{ $guru->nip }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Nama</label>
                                <div class="col-sm-10">
                                    {{ $guru->nama_guru }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    {{ $guru->pelajaran->nama_pelajaran }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Tanggal lahir</label>
                                <div class="col-sm-10">
                                    {{ $guru->tanggal_lahir->format('d-m-Y') }}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Jenis Kelamin</label>
                                @if ($guru->jenis_kelamin == 'L')
                                <div class="col-sm-10">Laki - laki</div>
                                @else ($guru->jenis_kelamin == 'P')
                                <div class="col-sm-10">Perempuan</div>
                                @endif
                            </div>

                            <div class="row">
                                <label class="col-sm-2">Alamat</label>
                                <div class="col-sm-10">
                                    {{ $guru->alamat }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>
@stop