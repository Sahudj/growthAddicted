@extends('layouts.admin')

@section('content')

<style>
  .licenseClass{ display:none; }
  .requiredClass{ color : red; }
</style>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="col-lg-12">
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

                 <div class="col s12 display-flex justify-content-end">
                <a href="{{url('admin/admin-listing')}}" class="btn waves-effect waves-light purple lightrn-1"> Users List</a>
            </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                    <h5>Add Admin Users</h5>
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/add-user')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s4">
                                <label>Name <sup style="color:red;">*</sup> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter First Name" required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col s4">
                              <label> Email <sup style="color:red;">*</sup> </label>
                              <input type="text" name="email" id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    
                          
                          <div class="col s4">
                              <label> Password <sup style="color:red;">*</sup> </label>
                              <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Enter Password" required>
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>                        
                        </div>
                        <br>
                        <div class="row">
                         
                         <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="usersListing" value="1">
                                  <span>User Listing</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="adminUserListing" value="1">
                                  <span>Admin Users Listing</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="course" value="1">
                                  <span>Courses</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="packages" value="1">
                                  <span>Packages</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="traffic" value="1">
                                  <span>Traffic</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="payouts" value="1">
                                  <span>Payouts</span>
                                </label>
                              </p>
                          </div>

                           <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="leaderboard" value="1">
                                  <span>Leaderboard</span>
                                </label>
                              </p>
                          </div>

                           <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="offers" value="1">
                                  <span>Offer</span>
                                </label>
                              </p>
                          </div>

                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="setting" value="1">
                                  <span>Setting</span>
                                </label>
                              </p>
                          </div>

                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="training" value="1">
                                  <span>Training</span>
                                </label>
                              </p>
                          </div>

                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="emailTemplate" value="1">
                                  <span>Email Template</span>
                                </label>
                              </p>
                          </div>  

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_profile" value="1">
                                  <span>Profile</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_dashboard" value="1">
                                  <span>Dashboard</span>
                                </label>
                              </p>
                          </div>  

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_search" value="1">
                                  <span>Search</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_bank_req" value="1">
                                  <span>Bank Request</span>
                                </label>
                              </p>
                          </div>  

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_social_media" value="1">
                                  <span>Social Media</span>
                                </label>
                              </p>
                          </div>
                          
                        </div> 

                        <br>
                      <div class="row">

                        <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            Save changes</button>
                        </div>
                      </div>
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>


@endsection           