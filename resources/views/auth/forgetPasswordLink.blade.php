@extends('layouts.login.forgot')

@section('content')

    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
            <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
            <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Reset Password</h5>
          <p class="ml-4">You can reset your password</p>
        </div>
      </div>
            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">person_outline</i>
                            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            <label for="username" class="center-align">Email</label>
                        </div>
                        </div>
  
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">lock_outline</i>
                            <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                            <label for="username" class="center-align">Password</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">lock_outline</i>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                            <label for="username" class="center-align">Confirm Password</label>
                        </div>
                    </div>

                    <div class="input-field col s12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                      </form>
            </div>
          </div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

@endsection
