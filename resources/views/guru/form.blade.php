<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Input Guru</h3>
    </div>
    <form role="form">
        @if (isset($guru))
        {!! Form::hidden('id', $guru->id) !!}
        @endif
        <div class="card-body">

            <div class="form-group">
                {!! Form::label('nip', 'NIP:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::text('nip', null, ['class' => 'form-control '. ($errors->has('nip') ? 'is-invalid' : 'is-valid')]) !!}
                @else
                {!! Form::text('nip', null, ['class' => 'form-control']) !!}
                @endif

                @if ($errors->has('nip'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('nip') }}</span>
                @endif
            </div>


            <div class="form-group">
                {!! Form::label('nama_guru', 'Nama:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::text('nama_guru', null, ['class' => 'form-control '. ($errors->has('nama_guru') ? 'is-invalid' : 'is-valid')]) !!}
                @else
                {!! Form::text('nama_guru', null, ['class' => 'form-control']) !!}
                @endif

                @if ($errors->has('nama_guru'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('nama_guru') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('tanggal_lahir', 'Tanggal Lahir:',
                ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::date('tanggal_lahir', !empty($guru) ?
                $guru->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control '. ($errors->has('tanggal_lahir') ? 'is-invalid' : 'is-valid'), 'id' => 'tanggal_lahir']) !!}
                @else
                {!! Form::date('tanggal_lahir', !empty($guru) ?
                $guru->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
                @endif

                @if ($errors->has('tanggal_lahir'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('tanggal_lahir') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('id_pelajaran', 'Mata Pelajaran:', ['class'=>'control-label']) !!}
                @if(count($list_pelajaran) > 0)

                @if ($errors->any())
                <div>
                    {!! Form::select('id_pelajaran', $list_pelajaran, null, ['class'=>'btn '. ($errors->has('id_pelajaran') ? 'btn-danger' : 'btn-info'), 'id'=>'id_pelajaran', 'placeholder'=>'Pilih Pelajaran']) !!}
                </div>
                @else
                <div>
                    {!! Form::select('id_pelajaran', $list_pelajaran, null, ['class'=>'btn btn-success', 'id'=>'id_pelajaran', 'placeholder'=>'Pilih Pelajaran']) !!}
                </div>
                @endif

                @else
                <p>Tidak ada pilihan pelajaran, buat terlebih dahulu</p>
                @endif

                @if ($errors->has('id_pelajaran'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('id_pelajaran') }}</span>
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
                {!! Form::label('alamat', 'Alamat:', ['class'=>'control-label']) !!}
                @if ($errors->any())
                {!! Form::textarea('alamat', null, ['class' => 'form-control '. ($errors->has('alamat') ? 'is-invalid' : 'is-valid'), 'rows' => 2]) !!}
                @else
                {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 2]) !!}
                @endif

                @if ($errors->has('alamat'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('alamat') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('foto', 'Foto:', ['class'=>'control-label']) !!}
                <br>{!! Form::file('foto', ['class' => '']) !!}
                @if ($errors->has('foto'))
                <span class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> {{ $errors->first('foto') }}</span>
                @endif
                <!-- MENAMPILKAN FOTO-->
                @if (isset($guru))

                @if (isset($guru->foto))
                <img src="{{ asset('fotoupload/' . $guru->foto) }}" alt="">
                @else

                @if ($guru->jenis_kelamin == 'L')
                <img src="{{ asset('fotoupload/dummymale.png') }}" alt="">
                @else
                <img src="{{ asset('fotoupload/dummyfemale.png') }}" alt="">
                @endif

                @endif
                @endif
            </div>