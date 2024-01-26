@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
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
                <div class="row">
                <form method="POST" name="brand-form" id="brand-form" action="{{url('admin/add-webinar')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="row">
                      <div class="col s6">
                        <div class="form-group">
                            <label>Topic </label>
                            <input type="text" name="topic" class="form-control @error('topic') is-invalid @enderror" placeholder="Enter topic" value="" required>
                            @error('topic')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                        </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Trainer </label>
                          <input type="text" name="trainer" class="form-control @error('trainer') is-invalid @enderror" placeholder="Enter trainer" value="" required>

                          @error('trainer')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Webinar Date </label>
                          <input type="date" name="webinar_date" class="form-control @error('webinar_date') is-invalid @enderror" placeholder="Enter webinar date" value="" required>

                          @error('webinar_date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Webinar Time </label>
                          <input type="text" name="webinar_time" class="form-control @error('webinar_time') is-invalid @enderror" placeholder="Enter webinar time" value="" required>

                          @error('webinar_time')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Meeting ID </label>
                          <input type="text" name="meeting_id" class="form-control @error('meeting_id') is-invalid @enderror" placeholder="Enter meeting id" value="" required>

                          @error('meeting_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Webinar Passcode </label>
                          <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Passcode" value="" required>

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Upload Thumbnail </label> <br>
                          <input type="file" name="thumbnail" class="form-control" accept="image/*" >
                         </div>    
                      </div>

                      <div class="col s6">
                        <div class="form-group">
                          <label> Meeting Url </label> <br>
                          <input type="url" name="meeting_url" class="form-control">
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
              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection           
