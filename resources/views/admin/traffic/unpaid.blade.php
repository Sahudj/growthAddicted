@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
            
              <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col m3"><a href="#test2" class="active">Unpaid leads</a></li>
                  </ul>
                </div>
            
              <div id="test2" class="col s12">
                <br>

                <br>
                  <p>Search : </p>
                    <form method="post" name="search-form" id="search-form" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col m3 s12">
                                <label>From </label>
                                <input type="date" name="fromDate" class="form-control" id="fromDate" value="{{isset($_GET['fromDate']) ? $_GET['fromDate'] : ''}}"  placeholder="Enter from date">
                          </div>

                          <div class="col m3 s12">
                                <label>To </label>
                                <input type="date" name="toDate" class="form-control" id="toDate" value="{{isset($_GET['toDate']) ? $_GET['toDate'] : ''}}"  placeholder="Enter to date">
                          </div>
                         
                          <div class="col m3 s12">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}" placeholder="Enter Name">
                          </div>

                            <div class="col m3 s12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{isset($_GET['email']) ? $_GET['email'] : ''}}" placeholder="Enter email address">
                          </div>

                          <div class="col m3 s12">
                                <label>Packages</label>
                                <select class="form-control" name="packages" id="packages">
                                  <option value="">Please select</option>
                                  @foreach($packages as $row)
                                  <?php 
                                    $selected = '';
                                    if(isset($_GET['packages']) && $_GET['packages'] == $row->id){
                                      $selected = 'selected = "selected"';
                                    }
                                  ?>
                                    <option {{$selected}} value="{{$row->id}}">{{$row->name}}</option>
                                  @endforeach
                                </select>
                          </div>

                        </div>
                      
                        <br>

                      <div class="row">    
                        <div class="col s12 display-flex center-content-end mt-3">
                          <input type="hidden" name="userId" value="">  
                          <input type="hidden" name="type" value="2">
                          <button type="submit" class="btn indigo">
                            Filter</button>
                        </div>
                      </div>

                    </form>

                    
                <div class="responsive-table">
                      <table id="teststst" class="table myYajra">
                        <thead>
                          <tr>
                          <th>Sr. No</th>
                          <th>ProfilePic</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>PackageName</th>
                            <th>Reg Date</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                      </table>
                    </div>

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
    $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.myYajra').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
              url: "{{ url('admin/unpaid-traffic') }}",
              data: function (d) {
                  d.packages = $("#packages option:selected").val();
                  d.fromDate = $("#fromDate").val();
                  d.toDate = $("#toDate").val();
                  d.name = $("#name").val();
                  d.email = $("#email").val();
              }
          },   
        columns: [
            {data: 'id', name: 'id'},
             {data: 'profilePic', name: 'profilePic'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'}, 
            {data: 'mobile_no', name: 'mobile_no'}, 
            {data: 'packageName', name: 'packageName'},
            {data: 'createdAt', name: 'createdAt'},
            {data: 'amount', name: 'amount'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        stateSave: true,
        bDestroy: true,
    });
     
    $('#search-form').on('submit', function(e) {
         table.draw();
         e.preventDefault();
    });
   
     
  });

</script>

@endsection           
