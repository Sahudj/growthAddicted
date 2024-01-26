@extends('layouts.admin')

@section('content')

    <section class="users-list-wrapper section">
      <div class="users-list-table">
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
        <!-- datatable start -->
 
            <div class="col s12 display-flex justify-content-end mt-3">
                <a href="{{url('admin/add-webinar/')}}" class="mb-3 btn waves-effect waves-light purple lightrn-1"> <i class="material-icons">add</i> Add Webinar</a>
            </div>
 
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Trainer</th>
                <th>Date</th>
                <th>Time</th>
                <th>Link</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach($listing as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->trainer}}</td>
                <td>{{$row->webinar_date}}</td>
                <td>{{$row->webinar_time}}</td>
                <td>{{$row->meeting_id}}</td>
                <td>{{$row->password}}</td>
                <td>
                  <a href="{{url('admin/edit-webinar/'.$row->id)}}"><i class="material-icons">edit</i></a>
                  <a href="{{url('admin/delete-webinar/'.$row->id)}}"><i class="material-icons">delete_forever</i></a>
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