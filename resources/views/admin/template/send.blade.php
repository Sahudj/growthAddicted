@extends('layouts.admin')

@section('content')

 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">

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
                  
                  <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="templatForm" action="{{url('admin/send-email-users')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s12">
                                <label>Title <sup style="color:red;">*</sup> </label>
                               <select class="form-control select2 browser-default" name="template">
                                <option value="">Please select</option>
                                  @foreach($templates as $row)
                                  <option value="{{$row->id}}">{{$row->title}}</option>
                                  @endforeach()
                               </select>
                                @error('template')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col s12">
                              <label> Users <sup style="color:red;">*</sup> </label>
                              
                               <select class="select2 browser-default" name="users[]" multiple>
                               
                                  @foreach($users as $row)
                                  <option value="{{$row->name.'||'.$row->email}}">{{$row->name}} - {{$row->email}}</option>
                                  @endforeach()
                               </select>

                              @error('users')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    

                          </div>

                          <div class="row">
                            
                            <div class="col s3">
                              <p>
                                <label>
                                  <input type="checkbox" name="all" value="1">
                                  <span>Send to All</span>
                                </label>
                              </p>
                          </div>
                          </div>
                      <div class="row">

                        <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            Send Mail</button>
                        </div>
                      </div>
                      </form>
                   </div>

                  </div>
                </div>
              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <script type="text/javascript">
        function copyText(text){
        var inp =document.createElement('input');
        document.body.appendChild(inp)
        inp.value = text;
        inp.select();
        document.execCommand('copy',false);
        inp.remove();
}






      </script>

@endsection           
