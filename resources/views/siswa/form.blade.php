<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Input Siswa</h3>
    </div>
    <form role="form">
        @if (isset($siswa))
        {!! Form::hidden('id', $siswa->id) !!}
        @endif
        <div class="card-body">

            <div class="form-group">
                {!! Form::label('nisn', 'NISN:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::text('nisn', null, ['class' => 'form-control '. ($errors->has('nisn') ? 'is-invalid' : 'is-valid')]) !!}
                @else
                {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
                @endif

                @if ($errors->has('nisn'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('nisn') }}</span>
                @endif
            </div>


            <div class="form-group">
                {!! Form::label('nama_siswa', 'Nama:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::text('nama_siswa', null, ['class' => 'form-control '. ($errors->has('nama_siswa') ? 'is-invalid' : 'is-valid')]) !!}
                @else
                {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
                @endif

                @if ($errors->has('nama_siswa'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('nama_siswa') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('tanggal_lahir', 'Tanggal Lahir:',
                ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::date('tanggal_lahir', !empty($siswa) ?
                $siswa->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control '. ($errors->has('tanggal_lahir') ? 'is-invalid' : 'is-valid'), 'id' => 'tanggal_lahir']) !!}
                @else
                {!! Form::date('tanggal_lahir', !empty($siswa) ?
                $siswa->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
                @endif

                @if ($errors->has('tanggal_lahir'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('tanggal_lahir') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('id_kelas', 'Kelas:', ['class'=>'control-label']) !!}
                @if(count($list_kelas) > 0)

                @if ($errors->any())
                <div>
                    {!! Form::select('id_kelas', $list_kelas, null, ['class'=>'btn '. ($errors->has('id_kelas') ? 'btn-danger' : 'btn-info'), 'id'=>'id_kelas', 'placeholder'=>'Pilih Kelas']) !!}
                </div>
                @else
                <div>
                    {!! Form::select('id_kelas', $list_kelas, null, ['class'=>'btn btn-info', 'id'=>'id_kelas', 'placeholder'=>'Pilih Kelas']) !!}
                </div>
                @endif

                @else
                <p>Tidak ada pilihan kelas, buat terlebih dahulu</p>
                @endif

                @if ($errors->has('id_kelas'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('id_kelas') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('id_ekskul', 'Ekskul:', ['class'=>'control-label']) !!}
                @if(count($list_ekskul) > 0)

                @if ($errors->any())
                <div>
                    {!! Form::select('id_ekskul', $list_ekskul, null, ['class'=>'btn '. ($errors->has('id_ekskul') ? 'btn-danger' : 'btn-info'), 'id'=>'id_ekskul', 'placeholder'=>'Pilih Ekskul']) !!}
                </div>
                @else
                <div>
                    {!! Form::select('id_ekskul', $list_ekskul, null, ['class'=>'btn btn-info', 'id'=>'id_ekskul', 'placeholder'=>'Pilih Ekskul']) !!}
                </div>
                @endif

                @else
                <p>Tidak ada pilihan ekskul, buat terlebih dahulu</p>
                @endif

                @if ($errors->has('id_ekskul'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('id_ekskul') }}</span>
                @endif
            </div>


            <div class="form-group">
                {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class'=>'control-label']) !!}
                <div class="radio">
                    <label for="">{!! Form::radio('jenis_kelamin', 'L') !!} Laki laki</label>
                </div>
                <div class="radio">
                    <label for="">{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
                </div>

                @if ($errors->has('jenis_kelamin'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('jenis_kelamin') }}</span>
                @endif
            </div>


            <div class="form-group">
                {!! Form::label('nomor_telepon', 'Nomor Telepon:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::text('nomor_telepon', null, ['class' => 'form-control '. ($errors->has('nomor_telepon') ? 'is-invalid' : 'is-valid')]) !!}
                @else
                {!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}
                @endif

                @if ($errors->has('nomor_telepon'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('nomor_telepon') }}</span>
                @endif

            </div>

            <div class="form-group">
                {!! Form::label('alamat', 'Alamat:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::textarea('alamat', null, ['class' => 'form-control '. ($errors->has('alamat') ? 'is-invalid' : 'is-valid'), 'rows' => 2]) !!}
                @else
                {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 2]) !!}
                @endif

                @if ($errors->has('alamat'))
                <span class="invalid-feedback"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('alamat') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('foto', 'Foto:', ['class'=>'control-label']) !!}
                <br>{!! Form::file('foto', ['class' => '']) !!}
                @if ($errors->has('foto'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('foto') }}</span>
                @endif
                <!-- MENAMPILKAN FOTO-->
                @if (isset($siswa))

                @if (isset($siswa->foto))
                <img src="{{ asset('fotoupload/' . $siswa->foto) }}" alt="">
                @else

                @if ($siswa->jenis_kelamin == 'L')
                <img src="{{ asset('fotoupload/dummymale.png') }}" alt="">
                @else
                <img src="{{ asset('fotoupload/dummyfemale.png') }}" alt="">
                @endif

                @endif
                @endif
            </div>