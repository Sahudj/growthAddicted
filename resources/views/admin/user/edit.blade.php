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
                <a href="{{url('admin/user-listing')}}" class="btn waves-effect waves-light purple lightrn-1"> Users List</a>
            </div>

                  <br>
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/edit-user')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s6">
                                <label>Name <sup style="color:red;">*</sup> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter First Name" required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col s6">
                              <label> Email <sup style="color:red;">*</sup> </label>
                              <input type="text" name="email" id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ $getDetails->email }}" placeholder="Enter email" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    
                          
                          <div class="col s6">
                              <label> Password</label>
                              <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{ $getDetails->user_pass }}" name="password" placeholder="Enter Password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="col s6">
                                <label>WhatsApp No <sup style="color:red;">*</sup> </label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $getDetails->mobile_no }}" placeholder="Enter First phone" required>
                                @error('phone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col s3">
                            <div class="form-group">
                              <label> State </label>
                              <select class="form-control" name ="state">
                               <option value="">Please select</option> 
                              @foreach($states as $row)
                                  <option value="{{$row->id}}" {{($getDetails->state == $row->id) ? "selected" : ""}} >{{$row->state}}</option>
                              @endforeach
                              </select>

                              @error('state')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>    
                          </div>   

                       <!--    <div class="col s3">
                            <label>Commission Status </label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="status" value="1" {{($getDetails->status == 1) ? "checked" : "" }} >
                                  <span>Active</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="status" value="0"  {{($getDetails->status == 0) ? "checked" : "" }}>
                                  <span>Inactive</span>
                                </label>
                              </p>
                          </div> -->

                            <div class="col s3">
                            <label>Enable Third Tier</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="enable_third_tier" value="1" {{($getDetails->enable_third_tier == 1) ? "checked" : "" }} >
                                  <span>Active</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="enable_third_tier" value="0"  {{($getDetails->enable_third_tier == 0) ? "checked" : "" }}>
                                  <span>Inactive</span>
                                </label>
                              </p>
                          </div>


                        <div class="col s3">
                            <label>Enable Team Helping Bonus</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="enable_team_helping" value="1" {{($getDetails->enable_team_helping == 1) ? "checked" : "" }} >
                                  <span>Yes</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="enable_team_helping" value="0"  {{($getDetails->enable_team_helping == 0) ? "checked" : "" }}>
                                  <span>No</span>
                                </label>
                              </p>
                          </div>
                        
                        </div>


                    <div class="row">

                          <div class="col s3">
                            <label>Show only courses</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="show_only_courses" value="1" {{($getDetails->show_only_courses == 1) ? "checked" : "" }} >
                                  <span>Yes</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="show_only_courses" value="0"  {{($getDetails->show_only_courses == 0) ? "checked" : "" }}>
                                  <span>No</span>
                                </label>
                              </p>
                          </div>

                          <div class="col s3">
                            <label>Hide From LeaderBoard</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="is_show_leaderboard" value="1" {{($getDetails->is_show_leaderboard == 1) ? "checked" : "" }} >
                                  <span>Show</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="is_show_leaderboard" value="0"  {{($getDetails->is_show_leaderboard == 0) ? "checked" : "" }}>
                                  <span>Hide</span>
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


                          <div class="col s3">
                            <label>Enable Account Without Payment & Package</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="enableradioPrimary1" name="enable_account" value="1" {{($getDetails->enable_account == 1) ? "checked" : "" }} >
                                  <span>Yes</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="disableradioPrimary1" name="enable_account" value="0"  {{($getDetails->enable_account == 0) ? "checked" : "" }}>
                                  <span>No</span>
                                </label>
                              </p>
                          </div>
                        </div>
                          <?php 
                            $class = '';
                            $class = ($getDetails->enable_account == 1) ? 'block':'none'; 

                          ?>
                          <div class="row" id="packageList" style="display: {{$class}} ;">
                              <div class="col s3" >
                                <label>Select Package</label> <br>
                                  <select class="form-control" name="addPackage" id="addPackage">
                                    <option value="">Please select</option>
                                    @foreach($packages as $row)
                                     <option value="{{$row->id}}" {{($getDetails->package_id == $row->id) ? "selected" : ""}}>{{$row->name}}</option>
                                    @endforeach
                                  </select>
                              </div>

                              <div class="col s3">
                                <label>Sponsor Commission</label> 
                                <input type="number" name="sponsor_amount" value="{{!empty($getDetails->sponsor_comm) ? $getDetails->sponsor_comm : 0 }}" placeholder="Enter Sponsor Amount" class="form-control">
                              </div>

                            </div>

                         
                         <br>
                          

                        <div class="row">    
                            <input type="hidden" name="userId" value="{{$getDetails->id}}">   
                        <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            Save changes</button>
                        </div>
                        </div>
                          
                      </form>
                      <div class="row">
                        @if(isset($document) && !empty($document))
                      <hr>
                        <h4>Documents</h4>
                          <ul>
                          @if($document->document1)
                            <li>First Side : <a href="{{url('public/document/'.$document->document1)}}">View</a> </li>
                          @endif
                          @if($document->document2)
                            <li>Second Side : <a href="{{url('public/document/'.$document->document2)}}">View</a>  </li>
                          @endif
                         
                          </ul>
                        @endif
                      </div>


                    <div class="row">
                        <hr>
                        <h4>Address</h4>
                          <div class="col m6 s12">
                                <label>Address <sup style="color:red;">*</sup> </label>
                                <input type="text" disabled class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->address) ? $getDetails->address : '' }}" placeholder="Enter Address">
                          </div>

                          <div class="col m6 s12">
                                <label>City <sup style="color:red;">*</sup> </label>
                                <input type="text" disabled class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->city) ? $getDetails->city : '' }}" placeholder="Enter City Name">
                          </div>
                         
                          <div class="col m6 s12">
                            <div class="form-group">
                              <label> State </label>
                              <select class="form-control" disabled>
                               <option value="">Please select</option> 
                              @foreach($states as $row)
                                  <option value="{{$row->id}}" {{($getDetails->state == $row->id) ? "selected" : ""}} >{{$row->state}}</option>
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
                                <input type="text" disabled class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->pin_code) ? $getDetails->pin_code : '' }}" placeholder="Enter Pin code">
                          </div>
                      </div>

                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>

<script type="text/javascript">
  $("#enableradioPrimary1").click(function(){
    $("#packageList").show();
    $("#enableDisable").val(0);
  })

  $("#disableradioPrimary1").click(function(){
    $("#packageList").hide();
    $("#enableDisable").val(1);
    $("#addPackage").val();

  })


</script>
@endsection           