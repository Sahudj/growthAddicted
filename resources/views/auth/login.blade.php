@extends('layouts.login.login')

@section('content')

 <div class="login_main_wrapper">
    <div class="login_inner_box">
      <div class="left_content">
        <div class="left_img">
          <img src="{{url('public/frontend/login')}}/assets/images/New-login.png" alt="left_img">
        </div>
      </div>
      <div class="right_form">
        <div class="right_inner">
           @if(session()->has('message'))
            @if($message = Session::get('message'))
              <div class="alert alert-danger" style="color:red; font-size: 15px; font-weight: 600">  <p>{{ $message }}.</p> </div>
            @endif
          @endif
          
          <div class="top_heading">
            <img src="{{url('public/frontend/login')}}/assets/images/footer-logo.png" alt="logo-img">
            <h1>Welcome to
              <span>Growth Addicted</span>
            </h1>
            <!-- <h1>Welcome to
              <span></span>Growth Addicted
            </h1> -->
          </div>
          <form method="POST" class="login-form" action="{{ route('login') }}">
            @csrf
          <div class="input-field">
            <label>Enter Email ID</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" style="color: red;" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
          </div>
          <div class="input-field">
            <label>Enter your password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
              @error('password')
                  <span class="invalid-feedback" style="color: red;" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <i toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" aria-hidden="true"></i>
          </div>
          <div class="checkbox">
            <!-- <label>
              <input type="checkbox">
              <span class="checkmark"></span>
              <span class="remember">Remember me</span>
            </label> -->
            <span class="forget">

                @if (Route::has('password.request'))
                          <a class="" href="{{ url('forget-password') }}">
                              {{ __('Forgot password?') }}
                          </a>
                      @endif
              </span>
          </div>
          <div class="login">
            <button type="submit" class="btn">Log-In</button>
            <p>Don’t Have Account? <a href="{{url('signup')}}">sign-up</a></p>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<script>

$(document).on('click', '.toggle-password', function() {

$(this).toggleClass("fa-eye fa-eye-slash");

var input = $("#password");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});

</script>
  
@endsection
