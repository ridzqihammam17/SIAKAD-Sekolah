@extends('admin/admin_template')

@section('main')
<div id="index">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/' )}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('guru' )}}">Guru</a></li>
                        <li class="breadcrumb-item active">Edit Guru</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            {!! Form::model($guru, ['method'=>'PATCH', 'files' => true,'action'=>['GuruController@update', $guru->id]]) !!}
            @include('guru.form', ['submitButtonText' => 'Simpan'])
            </form>
        </div>
        <div class="card-footer">
            {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary'] ) !!}
            <a href="{{ url('/guru') }}" class="btn btn-danger float-right">Cancel</a>
        </div>
        {!! Form::close() !!}
</div>
</section>
</div>
@stop