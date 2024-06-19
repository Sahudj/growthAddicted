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


<div class="profile-page">
  <div class="profile-profile-cont">
    <div class="prf-header">
      <div class="prf-title">
        <h1>Affiliate Links</h1>
      </div>
    </div>
    <!-- top container  -->
    <form method="POST" name="banner-form" id="banner-form" action="{{url('user/profile')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="top-cont">
        <div class="inner-top-cont">
          <div class="left-cont">

          </div>
          <div class="right-cont">
            <div class="upper-cont">

            </div>
            <div class="update-btn">
              
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- bottom container  -->
    <div class="bottom-cont">
      <div class="inner-bottom-cont">
        <h1>Sponsor</h1>
      </div>
    </div>
  </div>
</div>

<!-- old code  -->
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
              <label>Name</label>
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
                <label>Name <sup style="color:red;">*</sup> </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter First Name" required readonly>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col m6 s12">
                <label> Email <sup style="color:red;">*</sup> </label>
                <input type="text" name="email" id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ $getDetails->email }}" placeholder="Enter email" required readonly>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>


              <div class="col m6 s12">
                <label>WhatsApp No <sup style="color:red;">*</sup> </label>
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
                <label>DOB <sup style="color:red;">*</sup> </label>
                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->dob) ? $getDetails->dob : '' }}" placeholder="Enter DOB">
              </div>
              <div class="col m6 s12">
                <label>Address <sup style="color:red;">*</sup> </label>
                <input type="text" name="address" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->address) ? $getDetails->address : '' }}" placeholder="Enter Address">
              </div>

              <div class="col m6 s12">
                <label>City <sup style="color:red;">*</sup> </label>
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
    </div><!-- /.card -->
  </div>

</div>


@endsection