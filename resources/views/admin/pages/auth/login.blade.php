@extends('admin.layouts.login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <p>  Admin Panel</p>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

        <form action="{{ route('admin.login') }}" method="post">
            @csrf
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="{{ __('E-mail') }}" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          {{--
             <div class="col-xs-6">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div> 
          --}}
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>

      <div class="row">
            <div class="col-xs-4">
                <div style="font-size: 36px;;color:black">
                  <a href="{{url('redirect/google')}}">
                    <i class="fa fa-google"></i>
                  </a>   
                </div>
            </div> 
            <div class="col-xs-4">
              <div style="font-size: 36px;color:black;margin-left:1em">
                <a href="{{url('redirect/github')}}">
                  <i class="fa fa-github" style="color:black"></i>
                </a>   
              </div>
            </div>

            <div class="col-xs-4">
              <div style="font-size: 36px;;color:black;float:right">
                    <a href="{{url('redirect/facebook')}}">
                        <i  class="fa fa-facebook fa-10x"></i>
                    </a>          
              </div>
          </div> 
      </div>

            {{-- <button type="submit" class="btn btn-primary">
                {{ __('Login with FaceBook') }}
            </button> --}}
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection
