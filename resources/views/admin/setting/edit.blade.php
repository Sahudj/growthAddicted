@extends('layouts.admin')

@section('content')

<style>
  .licenseClass{ display:none; }
  .requiredClass{ color : red; }
</style>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
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

                  <div class="right-align">
                    <a href="{{url('admin/setting')}}" class="btn bnt-sm customBtn"> <i class="fa fa-list"></i> Setting List</a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/update-setting')}}" enctype="multipart/form-data">
                       
                      {{ csrf_field() }}
                    
                        <div class="row">
                        <div class="col m4 s12">
                              <label> Meta Key <sup style="color:red;">*</sup> </label>
                              <input type="text" name="meta_key" id="meta_key" class="form-control" value="{{$getDetails->meta_key}}" placeholder="Enter Meta Key" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            
                            <div class="col m8 s12">
                              <label> Meta Value <sup style="color:red;">*</sup> </label>
                              <input type="text" name="meta_value" id="meta_value" class="form-control" value="{{$getDetails->meta_value}}" placeholder="Enter Meta Value" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>
                     <br>
                      <div class="col-12">
                        <div class="offset-5 right-center">   
                            <input type="hidden" name="id" value="{{$getDetails->id}}">                    
                          <input type="submit" name="submit" value="Submit" class="btn btn-md customBtn">  
                        </div>
                      </div>
                          
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <script>
      function addnewHtmlRow(){
        let getHtml = '';
        getHtml+='<div class="row">';
        
        getHtml+='<div class="col m4 s12">';
        getHtml+='<label>Meta Key <sup style="color:red;">*</sup></label><input type="text" name="meta_key[]" value="" required class="form-control" placeholder="Enter Meta Key">';
        getHtml+='</div>';
      
        getHtml+='<div class="col m8 s12">';
        getHtml+='<label>Meta Value <sup style="color:red;">*</sup></label> <input type="text" name="meta_value[]" required value="" class="form-control" placeholder="Enter Meta Value">';
        getHtml+='</div>';
        getHtml+='</div>';
        // getHtml+='<hr>';
        $('#newFieldsHtml').append(getHtml);
 
}
    </script>

@endsection           