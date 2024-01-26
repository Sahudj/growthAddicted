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
          <a href="{{url('admin/add-setting/')}}" class="mb-3 btn waves-effect waves-light purple lightrn-1"> <i class="material-icons">add</i> Add Setting</a>
      </div>
 
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Meta Key</th>
                <th>Meta Value</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($settings as $row)
              <tr>
                <td>{{$row->meta_key}}</td>
                <td>{{$row->meta_value}}</td>
                <td>
                  <a href="{{url('admin/edit-setting/'.$row->id)}}"><i class="material-icons">edit</i></a>
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