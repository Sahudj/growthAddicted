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
                    <br>
                  </div>
                  <br>
            
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/add-sponsor')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s6">
                                <label>UserName <sup style="color:red;">*</sup> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$getDetails->name}}" placeholder="Enter First Name" required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <input type="hidden" name="currentUserId" value="{{$getDetails->id}}">
                          <input type="hidden" name="currentUserPack" value="{{$getDetails->package_id}}">
                          <input type="hidden" name="currentUserEmail" value="{{$getDetails->email}}">
                          <input type="hidden" name="sponsorPack" id="sponsorPack" value="">
                          <input type="hidden" name="superSponsor" id="superSponsor" value="">
                          <input type="hidden" name="firstSponsorName" id="firstSponsorName" value="">
                          <input type="hidden" name="firstSponsorEmail" id="firstSponsorEmail" value="">

                          <div class="col s6">
                                <label>Choose Sponsor <sup style="color:red;">*</sup> </label>
                                <select class="select2 browser-default" name="sponsorId" id="sponsor" required>
                                  <option value="">Please select</option>
                                  @foreach($users as $row)
                                  <option value="{{$row->id}}" data-ref_by_user = "{{$row->ref_by_user}}" data-packageId = "{{$row->package_id}}" data-name="{{$row->name}}" data-email="{{$row->email}}">{{$row->name}} - {{$row->email}}</option>
                                  @endforeach
                                </select>
                              
                          </div>
                      </div>
                        <br>
                      <div class="row">
                        <div class="col s6">
                         <button type="submit" class="btn indigo">Save changes</button>
                       </div>
                      </div>

                        <div class="row">
                        <div class="col s6">
                        
                       </div>
                      </div>
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>

@endsection           