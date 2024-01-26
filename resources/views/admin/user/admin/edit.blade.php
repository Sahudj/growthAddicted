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
                    <h5>Edit Admin Users</h5>
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/edit-admin-user')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s4">
                                <label>Name <sup style="color:red;">*</sup> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter First Name" required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col s4">
                              <label> Email <sup style="color:red;">*</sup> </label>
                              <input type="text" name="email" id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ $getDetails->email }}" placeholder="Enter email" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    
                          
                          <div class="col s4">
                              <label> Password <sup style="color:red;">*</sup> </label>
                              <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{ $getDetails->user_pass }}" name="password" placeholder="Enter Password" required>
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
                                  <input type="checkbox" name="usersListing" value="1" {{($permissions->is_usersListing == 1) ? "checked" : "" }} >
                                  <span>User Listing</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="adminUserListing" value="1" {{($permissions->is_adminUserListing == 1) ? "checked" : "" }} >
                                  <span>Admin Users Listing</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="packages" value="1" {{($permissions->is_packages == 1) ? "checked" : "" }} >
                                  <span>Packages</span>
                                </label>
                              </p>
                          </div>  

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="course" value="1" {{($permissions->is_course == 1) ? "checked" : "" }} >
                                  <span>Courses</span>
                                </label>
                              </p>
                          </div>   


                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_dashboard" value="1" {{($permissions->is_dashboard == 1) ? "checked" : "" }} >
                                  <span>Dashboard</span>
                                </label>
                              </p>
                          </div>


                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_profile" value="1" {{($permissions->is_profile == 1) ? "checked" : "" }} >
                                  <span>Profile</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="traffic" value="1" {{($permissions->is_traffic == 1) ? "checked" : "" }} >
                                  <span>Traffic</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="payouts" value="1" {{($permissions->is_payouts == 1) ? "checked" : "" }} >
                                  <span>Payouts</span>
                                </label>
                              </p>
                          </div>

                           <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="leaderboard" value="1" {{($permissions->is_leaderboard == 1) ? "checked" : "" }} >
                                  <span>Leaderboard</span>
                                </label>
                              </p>
                          </div>

                           <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="offers" value="1" {{($permissions->is_offers == 1) ? "checked" : "" }} >
                                  <span>Offer</span>
                                </label>
                              </p>
                          </div>

                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="setting" value="1" {{($permissions->is_setting == 1) ? "checked" : "" }} >
                                  <span>Setting</span>
                                </label>
                              </p>
                          </div>

                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="training" value="1" {{($permissions->is_training == 1) ? "checked" : "" }} >
                                  <span>Training</span>
                                </label>
                              </p>
                          </div>

                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="emailTemplate" value="1" {{($permissions->is_emailTemplate == 1) ? "checked" : "" }} >
                                  <span>Email Template</span>
                                </label>
                              </p>
                          </div> 

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_search" value="1" {{($permissions->is_search == 1) ? "checked" : "" }} >
                                  <span>Search</span>
                                </label>
                              </p>
                          </div> 

                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_bank_req" value="1" {{($permissions->is_bank_req == 1) ? "checked" : "" }} >
                                  <span>Bank Request</span>
                                </label>
                              </p>
                          </div> 


                          <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="is_social_media" value="1" {{($permissions->is_social_media == 1) ? "checked" : "" }} >
                                  <span>Social Media</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                            <label>Deactivate account</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="status" value="1" {{($getDetails->status == 1) ? "checked" : "" }} >
                                  <span>No</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="status" value="0"  {{($getDetails->status == 0) ? "checked" : "" }}>
                                  <span>Yes</span>
                                </label>
                              </p>
                          </div>
                          
                        </div> 

                        <br>
                      <div class="row">
                        <input type="hidden" name="permissionId" value="{{$permissions->id}}">
                        <input type="hidden" name="user_id" value="{{$permissions->user_id}}">
                        <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            Update changes</button>
                        </div>
                      </div>
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>


@endsection           