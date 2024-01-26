@extends('layouts.admin')

@section('content')

    <section class="users-list-wrapper section">
      <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
 
            <div class="col s12 display-flex justify-content-end mt-3">
                <a href="{{url('admin/add-user/')}}" class="mb-3 btn waves-effect waves-light purple lightrn-1"> <i class="material-icons">add</i> Add User</a>
            </div>
 
        <div class="responsive-table">

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

          <table id="" class="myYajra">
            <thead>
              <tr>
                <th>Id</th>
               <th>Name</th>
               <th>Email</th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
    $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.myYajra').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/admin-listing') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'}, 
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
   
     
  });

</script>

@endsection           