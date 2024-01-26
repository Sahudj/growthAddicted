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
                   @if(session()->has('message.level'))
                        @if ($message = Session::get('message.content'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                  @endif

                <div class="col s12 display-flex justify-content-end">
                    <a href="{{url('admin/training-listing')}}" class="btn waves-effect waves-light purple lightrn-1"> Offer List</a>
                    
                </div>
                 </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/edit-training')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s6">
                              <label>YouTube Link <sup style="color:red;">*</sup> </label>
                                <input type="text" name="youtubeLink" class="form-control @error('youtubeLink') is-invalid @enderror" value="{{ ($getDetails->youTubeLink) }}" placeholder="Enter YouTube Link" required>
                                @error('youtubeLink')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>


                          <div class="col s6">
                              <label>Thumbnail <sup style="color:red;">*</sup> </label><br><br>
                              <img src = "{{url('public/training/'.$getDetails->thumbnail)}}" width="100px"> <br>
                              <input type="file" name="thumbnail" class="form-control" accept="image/*">
                              <input type="hidden" name="hiddenThumbnail" class="form-control" value="{{$getDetails->thumbnail}}">
                                @error('thumbnail')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>
                        
                          <div class="col-sm-4">
                            <label> Status </label> <br>
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
                          </div>

                        </div>
  
                        <br>
                      <div class="row">

                         <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            <input type ="hidden" name="id" value="{{$getDetails->id}}">
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