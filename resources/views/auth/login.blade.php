@extends('layouts.layout')

@section('content')
<div class="login-box">
  @if (Session::has('message'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fas fa-check"></i><strong> {{ Session::get('message') }}</strong>
  </div>
  @endif
  <div class="login-logo">
    <img src="{{ asset('asset/logo_navbar.png') }}" alt="" width="100px" height="100px">
  </div>
  <div class="login-logo">
    <p class="text-light"><b>Admin</b>SIAKAD</p>
  </div>
  <!-- /.login-logo -->

  <div class="card text-center">

    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Sign in to continue</b></p>

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input id="email " type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>



        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="row">
          <div class="" style="width: 8.9rem;">
            <div class="icheck-primary">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->

    <div class="card-footer">
      <p class="mb-0 text-dark">Don't have an account?
        <a href="{{ route('register') }}" class="text-center">Create</a>
      </p>
    </div>
  </div>
</div>
<!-- /.login-box -->
@endsection