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
                    <a href="{{url('admin/all-courses')}}" class="btn bnt-sm customBtn"> <i class="fa fa-list"></i> Courses List</a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{route('all-courses.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col m4 s12">
                                <label>Package Listing <sup style="color:red;">*</sup> </label>
                               <select name="packageId" id="packageId">
                                <option value=""> Please select</option>
                                @foreach($packages as $row)
                                  <option value="{{$row->id}}"> {{$row->name}} </option>
                                @endforeach
                               </select>
                          </div>

                          <div class="col m4 s12">
                              <label> Course Name (main Folder Name) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="mainFolderName" id="mainFolderName" class="form-control @error('mainFolderName') is-invalid @enderror" value="{{ old('mainFolderName') }}" placeholder="Enter Main Folder Name" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            
                            <div class="col m4 s12">
                              <label> Folder Id (main Folder Id) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="mainFolderId" id="mainFolderId" class="form-control @error('mainFolderId') is-invalid @enderror" value="{{ old('mainFolderId') }}" placeholder="Enter Main Folder Id" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          
                        </div>
                        <h6>Sub Folder Details</h6>
                        <div class="row">
                        <div class="col m6 s12">
                              <label> Folder Name (sub Folder Name) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="foldername[]" id="foldername" class="form-control" value="" placeholder="Enter sub Folder Name" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            
                            <div class="col m6 s12">
                              <label> Folder Id (sub Folder Id) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="folderId[]" id="folderId" class="form-control" value="" placeholder="Enter sub Folder Id" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>
                        <div id="newFieldsHtml" class="optionBox"></div>
                        <div class="right-align" style="margin-right: 15px;">
                        <br>
                        <button type="button" onclick="addnewHtmlRow()" class="btn btn-sm btn-success add-more"> +&nbsp; Add More</button>
                      </div>

                        <br>
                      <div class="col-12">
                        <div class="offset-5 right-center">                       
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
        
        getHtml+='<div class="col m6 s12">';
        getHtml+='<label>Folder Name <sup style="color:red;">*</sup></label><input type="text" name="foldername[]" value="" required class="form-control" placeholder="Enter Folder Name">';
        getHtml+='</div>';
      
        getHtml+='<div class="col m6 s12">';
        getHtml+='<label>Folder Id <sup style="color:red;">*</sup></label> <input type="text" name="folderId[]" required value="" class="form-control" placeholder="Enter Folder Id">';
        getHtml+='</div>';
        getHtml+='</div>';
        getHtml+='<hr>';
        $('#newFieldsHtml').append(getHtml);
 
}
    </script>

@endsection           