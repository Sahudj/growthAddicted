@extends('layouts.admin')

@section('content')
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
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
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="brand-form" id="brand-form" action="{{url('admin/profile')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s6">
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter Username" value="{{ $getDetails->name}}" required>
                                @error('username')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                            </div>    
                          </div>

                          <div class="col s6">
                            <div class="form-group">
                              <label> Email </label>
                             <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email getDetails" value="{{ $getDetails->email }}" required>

                             @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                            </div>    
                          </div>
          

                          <div class="col s6">
                            <div class="form-group">
                              <label> Password </label>
                             <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" value="{{$getDetails->user_pass}}">
                             @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                            </div>    
                          </div>

                          <div class="col s6">
                            <div class="form-group">
                              <label> Mobile No </label>
                             <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ !empty($getDetails->mobile_no) ? $getDetails->mobile_no : '' }}" placeholder="Enter Mobile No.">
                              @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                          </div> 
                      
                          <div class="col s6">
                            <div class="form-group">
                              <label> State </label>
                              <select class="form-control" name ="state">
                               <option value="">Please select</option> 
                              @foreach($states as $row)
                                  <option value="{{$row->id}}" {{($getDetails->state == $row->id) ? "selected" : ""}} >{{$row->state}}</option>
                              @endforeach
                              </select>
                            </div>    
                          </div> 
                        </div>
                      <div class="row">    
                        <div class="col s12 display-flex center-content-end mt-3">
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
<script type="text/javascript">

// $('#signatureImage').hide();
  imgInp.onchange = evt => {
    $('#signatureImage').show();  
  const [file] = imgInp.files
  if (file) {
    signatureImage.src = URL.createObjectURL(file)
  }
}

  document.getElementById('brand_image').onchange = function () {
  var src = URL.createObjectURL(this.files[0])
  document.getElementById('image').src = src
}
</script>
@endsection           