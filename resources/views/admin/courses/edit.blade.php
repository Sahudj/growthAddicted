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

                  <div class="right-align">
                    <a href="{{url('admin/all-courses')}}" class="btn bnt-sm customBtn"> <i class="fa fa-list"></i> Courses List</a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{route('all-courses.update', $getDetails[0]->package_id)}}" enctype="multipart/form-data">
                      @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col m4 s12">
                                <label>Package Listing <sup style="color:red;">*</sup> </label>
                               <select name="packageId" id="packageId">
                                <option value=""> Please select</option>
                                @foreach($packages as $row)
                                  <option value="{{$row->id}}" {{($getDetails[0]->package_id== $row->id) ? "selected" : ""}} > {{$row->name}} </option>
                                @endforeach
                               </select>
                          </div>

                          <div class="col m4 s12">
                              <label> Course Name (main Folder Name) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="mainFolderName" id="mainFolderName" class="form-control @error('mainFolderName') is-invalid @enderror" value="{{ $getDetails[0]->main_folder_name }}" placeholder="Enter Main Folder Name" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            
                            <div class="col m4 s12">
                              <label> Folder Id (main Folder Id) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="mainFolderId" id="mainFolderId" class="form-control @error('mainFolderId') is-invalid @enderror" value="{{ $getDetails[0]->main_folder_id }}" placeholder="Enter Main Folder Id" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          
                        </div>
                       
                        <div class="row">
                        <h6>Sub Folder Details</h6>
                        @foreach($getDetails as $row2)
                        <div class="col m5 s12">
                            <input type="hidden" name="subfolders[]" value="{{$row2->id}}">
                              <label> Folder Name (sub Folder Name) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="foldername[]" id="foldername" class="form-control" value="{{$row2->sub_folder_name}}" placeholder="Enter sub Folder Name" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            
                            <div class="col m5 s12">
                              <label> Folder Id (sub Folder Id) <sup style="color:red;">*</sup> </label>
                              <input type="text" name="folderId[]" id="folderId" class="form-control" value="{{$row2->sub_folder_id}}" placeholder="Enter sub Folder Id" required>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <div class="col m2">
                              <a class="btn btn-sm btn-info" onclick="return deleteCourse({{$row2->id}})"> Delete</a>
                            </div>
                          @endforeach  
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

                   <div class="row">
                     <h4>Gulmet Video Upload</h4>

                     <form method="POST" name="banner-form" id="banner-form" action="{{route('add-videos')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="col m5 s12">
                        <label> Folder Id (sub Folder Id) <sup style="color:red;">*</sup> </label>
                        <input type="text" name="folderId" id="folderId" class="form-control" value="" placeholder="Enter sub Folder Id" required>
                      </div>

                      <div class="col m5 s12">
                        <label> Video Id <sup style="color:red;">*</sup> </label>
                        <input type="text" name="videoId" id="videoId" class="form-control" value="" placeholder="Enter video Id comma seperated" required>
 
                      </div>

                      <div class="col-12">
                        <div class="offset-5 right-center">   
                        <input type="hidden" name="courseId" value="{{$getDetails[0]->package_id}}">                    
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
        getHtml+= '<input type="hidden" name="subfolders[]" value="">';
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