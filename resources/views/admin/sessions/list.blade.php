@extends('layouts.admin')

@section('content')

    <section class="users-list-wrapper section">
      <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->

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

 
      <div class="col s12 display-flex justify-content-end mt-3">
          <a href="{{url('admin/add-session/')}}" class="mb-3 btn waves-effect waves-light purple lightrn-1"> <i class="material-icons">add</i> Add Q & A Session</a>
      </div>
 
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Thumbnail</th>
                <th>YouTube Link</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($sessionsListing as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>
                  <img src="{{ url('/public/QAsession/'.$row->thumbnail)}}" width="50px" />

                </td>
                <td>{{$row->youtubeLink}}</td>
                <td> @if($row->status == 1)
                    <span class="chip green lighten-5">
                        <span class="green-text">Active</span>
                    </span>
                    @else
                    <span class="chip red lighten-5">
                        <span class="red-text">Inactive</span>
                    </span>
                    @endif
                </td>
                
                <td>
                <a href="{{url('admin/edit-session/'.$row->id)}}"><i class="material-icons">edit</i></a>
                    <a href="{{url('admin/delete-session/'.$row->id)}}"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
            @endforeach 
          </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>


@endsection           