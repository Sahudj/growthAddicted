@extends('layouts.admin')

@section('content')

<style>
  .licenseClass {
    display: none;
  }

  .requiredClass {
    color: red;
  }
</style>

<div class="card-content">
  <div class="col-lg-12">
    @if(session()->has('message'))
    @if($message = Session::get('message'))
    <div class="card-alert card gradient-45deg-green-teal">
      <div class="card-content white-text">
        <p>
          <i class="material-icons">check</i> SUCCESS : {{ $message }}.
        </p>
      </div>
      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    @endif
    @endif

  </div>
  <div class="profile-page">
    <div class="profile-profile-cont">
      <div class="prf-header">
        <div class="prf-title">
          <h1>Profile</h1>
        </div>
      </div>
      <!-- top container  -->
      <form method="POST" name="banner-form" id="banner-form" action="{{url('user/profile')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="top-cont">
          <div class="inner-top-cont">
            <!-- profile card  -->
            <div class="left-cont">
              <div class="image-box">

                <div class="img-box">
                  <div class="avatar-wrapper">
                    @if($getDetails->profile_pic)
                    <img id="imagePreview" src="{{url('public/profile_pic/'.$getDetails->profile_pic)}}" width="7s0px">
                    @endif
                  </div>
                  <div class="edit-btn-wrap">
                    <label for="pic-change">
                      <span class="material-symbols-outlined"> add_photo_alternate</span>
                      <input hidden type="file" name="profile_pic" id="pic-change" class="form-control" accept="image/png, image/jpeg">
                    </label>
                  </div>
                </div>
                <input type="hidden" name="hidden_image" value="{{ !empty($getDetails->profile_pic) ? $getDetails->profile_pic : ''}}">

              </div>
              <div class="text-box">
                <h2>{{ $getDetails->name }}</h2>
                <h2 class="mobile-nbr">{{ $getDetails->mobile_no }}</h2>
                <h2 class="email-cont">{{ $getDetails->email }} </h2>
                <input type="hidden" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter First Name" required readonly>
                <input type="hidden" name="email" id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ $getDetails->email }}" placeholder="Enter email" required readonly>
                <input type="hidden" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $getDetails->mobile_no }}" placeholder="Enter First phone" required readonly>
              </div>
            </div>
            <div class="right-cont">
              <div class="upper-cont">
                <div class="form-row">
                  <div class="form-grp1">

                    <label class="custm-label"> Gender </label>
                    <div class="gender-wrap">
                      <label class='{{($getDetails->gender == 1) ? "checked" : "" }}'>
                        <input type="radio" hidden id="radioPrimary1" name="gender" value="1">
                        <span class="material-symbols-outlined">
                          male
                        </span>
                        <p>male</p>
                      </label>

                      <label class='{{($getDetails->gender == 0) ? "checked" : "" }}'>
                        <input type="radio" hidden id="radioPrimary2" name="gender" value="0">
                        <span class="material-symbols-outlined">
                          female
                        </span>
                        <p>female</p>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-grp">
                    <label class="custm-label">DOB <span style="color:red;">*</span> </label>
                    <input type="date" name="dob" class=" custom-input form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->dob) ? $getDetails->dob : '' }}" placeholder="Enter DOB">
                  </div>
                  <div class="form-grp">
                    <label class="custm-label">City <span style="color:red;">*</span> </label>
                    <input type="text" name="city" class="custom-input form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->city) ? $getDetails->city : '' }}" placeholder="Enter City Name">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-grp">
                    <label class="custm-label"> State </label>
                    <select class="custom-input form-control" name="state">
                      <option value="">Please select</option>
                      @foreach($states as $row)
                      <option value="{{$row->id}}" {{($getDetails->state == $row->id) ? "selected" : ""}}>{{$row->state}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-grp">
                    <label class="custm-label">Pincode</label>
                    <input type="text" name="pin_code" class="custom-input form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->pin_code) ? $getDetails->pin_code : '' }}" placeholder="Enter Pin code">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-grp1">
                    <label class="custm-label">Address <span style="color:red;">*</span> </label>
                    <input type="text" name="address" class="custom-input form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->address) ? $getDetails->address : '' }}" placeholder="Enter Address">
                  </div>
                </div>
              </div>
              <div class="update-btn-cont">
                <input type="hidden" name="userId" value="{{$getDetails->id}}">
                <button type="submit" class="btn indigo save-change-btn ">Save Change</button>

              </div>
            </div>
          </div>
        </div>
        <!-- sponser container  -->
      </form>
      <div class="sponser-heading">
        <h1>Sponser</h1>
      </div>
      <div class="bottom-cont">
        <div class="sponser-cont">
          <div class="sponser-card">
            <div class="sponser-card-wrapper">
              <div class="card-left">
                <div class="card-img-box">
                  <img src="{{url('public/profile_pic/'.$getDetails->getRefBy->profile_pic)}}" width="70px">
                </div>
              </div>
              <div class="card-right">
                <h1>{{ !empty($getDetails->getRefBy->name) ? $getDetails->getRefBy->name : '' }}</h1>
                <h3>{{ !empty($getDetails->getRefBy->mobile_no) ? $getDetails->getRefBy->mobile_no : '' }}</h3>
                <h3>{{ !empty($getDetails->getRefBy->email) ? $getDetails->getRefBy->email : '' }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- bottom container  -->
      <!-- <div class="bottom-cont">
      <div class="inner-bottom-cont">
        <h1>Sponsor</h1>
      </div>
    </div> -->
    </div>
  </div>

  <!-- old code  -->
  <!-- <div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-content">
        <div class="col-lg-12">
          @if(session()->has('message'))
          @if($message = Session::get('message'))
          <div class="card-alert card gradient-45deg-green-teal">
            <div class="card-content white-text">
              <p>
                <i class="material-icons">check</i> SUCCESS : {{ $message }}.
              </p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          @endif
          @endif

        </div>
        @if(auth()->user()->id != 231)
        <div class="col-lg-12">
          <h4>Sponsor Information</h4>
          <hr>
          <div class="row">
            <div class="col m6 s12">
              <label>Name{{ !empty($getDetails->getRefBy->profile_pic) ? $getDetails->getRefBy->profile_pic : '' }}</label>



              <input type="text" readonly class="form-control" value="{{ !empty($getDetails->getRefBy->name) ? $getDetails->getRefBy->name : '' }}">
            </div>

            <div class="col m6 s12">
              <label>Email</label>
              <input type="text" readonly class="form-control" value="{{ !empty($getDetails->getRefBy->email) ? $getDetails->getRefBy->email : '' }}">
            </div>

            <div class="col m6 s12">
              <label>Mobile No</label>
              <input type="text" readonly class="form-control" value="{{ !empty($getDetails->getRefBy->mobile_no) ? $getDetails->getRefBy->mobile_no : '' }}">
            </div>

          </div>
        </div>
        <hr>
        @endif
        <h4>Personal Information</h4>
        <hr>
        <div class="col-lg-12">
          <form method="POST" name="banner-form" id="banner-form" action="{{url('user/profile')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col m6 s12">
                <label>Name <span style="color:red;">*</span> </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter First Name" required readonly>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col m6 s12">
                <label> Email <span style="color:red;">*</span> </label>
                <input type="text" name="email" id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ $getDetails->email }}" placeholder="Enter email" required readonly>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>


              <div class="col m6 s12">
                <label>WhatsApp No <span style="color:red;">*</span> </label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $getDetails->mobile_no }}" placeholder="Enter First phone" required readonly>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col m6 s12">
                <label> Gender </label> <br>

                <p>
                  <label>
                    <input type="radio" id="radioPrimary1" name="gender" value="1" {{($getDetails->gender == 1) ? "checked" : "" }}>
                    <span>Male</span>
                  </label>

                  <label>
                    <input type="radio" id="radioPrimary2" name="gender" value="0" {{($getDetails->gender == 0) ? "checked" : "" }}>
                    <span>Female</span>
                  </label>
                </p>

              </div>

              <div class="col m6 s12">
                <label>DOB <span style="color:red;">*</span> </label>
                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->dob) ? $getDetails->dob : '' }}" placeholder="Enter DOB">
              </div>
              <div class="col m6 s12">
                <label>Address <span style="color:red;">*</span> </label>
                <input type="text" name="address" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->address) ? $getDetails->address : '' }}" placeholder="Enter Address">
              </div>

              <div class="col m6 s12">
                <label>City <span style="color:red;">*</span> </label>
                <input type="text" name="city" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->city) ? $getDetails->city : '' }}" placeholder="Enter City Name">
              </div>

              <div class="col m6 s12">
                <div class="form-group">
                  <label> State </label>
                  <select class="form-control" name="state">
                    <option value="">Please select</option>
                    @foreach($states as $row)
                    <option value="{{$row->id}}" {{($getDetails->state == $row->id) ? "selected" : ""}}>{{$row->state}}</option>
                    @endforeach
                  </select>

                  @error('state')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="col m6 s12">
                <label>Pincode</label>
                <input type="text" name="pin_code" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->pin_code) ? $getDetails->pin_code : '' }}" placeholder="Enter Pin code">
              </div>


              <div class="col m6 s12">
                <label>Upload Profile Pic</label>
                @if($getDetails->profile_pic)
                <img src="{{url('public/profile_pic/'.$getDetails->profile_pic)}}" width="100px">
                <br>
                @endif
                <input type="hidden" name="hidden_image" value="{{ !empty($getDetails->profile_pic) ? $getDetails->profile_pic : ''}}">
                <input type="file" name="profile_pic" class="form-control" accept="image/png, image/jpeg">
              </div>

            </div>

            <br>

            <div class="row">
              <div class="col s12 display-flex center-content-end mt-3">
                <input type="hidden" name="userId" value="{{$getDetails->id}}">
                <button type="submit" class="btn indigo">
                  Save changes</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div> -->

  <script>
    $(document).ready(function() {
      $('.gender-wrap input[type="radio"]').change(function() {
        $('.gender-wrap label').removeClass('checked');
        $(this).parent('label').addClass('checked');
      });


      $('#pic-change').on('change', function(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result).show();
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
  @endsection