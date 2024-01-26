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
    <style type="text/css">
        .select-dropdown .dropdown-trigger{
            display: none !important;
        }
    </style>
        <div class="responsive-table">
          <table id="teststst" class="myYajra">
            <thead>
              <tr>
                <th>Id</th>
               <th>Name</th>
               <th>Email</th>
               <th>Mobile No</th>
               <th>Address</th>
               <th>Join <br>Status</th>
               <th>Sponsor Name</th>
              <!--  <th>Commission <br>Status</th> -->
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
        ajax: "{{ url('admin/user-listing') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'}, 
            {data: 'mobile_no', name: 'mobile_no'}, 
            {data: 'state', name: 'state'},
            {data: 'status', name: 'status'},
            {data: 'sponsor_name', name: 'sponsor_name'},
            // {data: 'comm_status', name: 'comm_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
  });

function sendWelcomeMail(userId){
    if(!confirm('Are you sure want to send email. ?')){
        return false;
    }
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $.ajax({
          url: '{{url("/admin/send-welcome-mail")}}',
          type: 'post', 
           data: {"_token": "{{ csrf_token() }}", userId : userId},
          success: function(data){
              alert("Welcome email has been send successfully. !");
          }
          
        });
    return false; 
}
</script>

@endsection           