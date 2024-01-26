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

       @if(session()->has('message'))
                        @if($message = Session::get('message'))
                        <div class="card-alert card gradient-45deg-green-teal">
                        <div class="card-content white-text">
                          <p>
                            <i class="material-icons">check</i> SUCCESS : {{ $message }}.</p>
                        </div>
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                        @endif
                @endif

              <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form>

                      <br>
                      
            </div>
          </div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

@endsection
