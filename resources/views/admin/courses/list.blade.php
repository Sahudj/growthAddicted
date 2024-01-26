@extends('layouts.admin')

@section('content')

<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-warning card-outline ">
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

                
                  <div class="right-align">
                    <a href="{{route('all-courses.create')}}" class="btn bnt-sm customBtn"> <i class="fa fa-plus"></i> Add Courses</a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                      <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                           <thead>
                               <tr>
                                  <th>Package Name</th>   
                                  <th>Course Name</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach($courses as $row)
                            <tr>
                              <td>{{$row->main_folder_name}}</td>
                              <td>{{$row->sub_folder_name}}</td>
                              <td>
                              <a href="{{route('all-courses.edit', $row->package_id)}}"><i class="material-icons">edit</i></a>
                              </td>
                            </tr>
                            @endforeach
                            
                           </tbody>
                       </table>
                       <div class="d-flex justify-content-center">
                         
                      </div>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });    

    $('.editButton').click(function(e) {
        if(!confirm('Are you sure you want to edit this?')) {
            e.preventDefault();
        }
    });
</script>

@endsection           