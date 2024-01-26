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
                    <li class="tab col m3"><a class="active" href="#test1">Paid leads</a></li>
                  </ul>
                </div>
                <div id="test1" class="col s12">
                  <br>
                  <p>Search : </p>
                   <form method="post" name="search-form" id="search-form" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col m3 s12">
                                <label>From </label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control" value="{{isset($_GET['fromDate']) ? $_GET['fromDate'] : ''}}"  placeholder="Enter from date">
                          </div>

                          <div class="col m3 s12">
                                <label>To </label>
                                <input type="date" id="toDate" name="toDate" class="form-control" value="{{isset($_GET['toDate']) ? $_GET['toDate'] : ''}}"  placeholder="Enter to date">
                          </div>
                         
                          <div class="col m3 s12">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}" placeholder="Enter Name">
                          </div>

                            <div class="col m3 s12">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{isset($_GET['email']) ? $_GET['email'] : ''}}" placeholder="Enter email address">
                          </div>

                          <div class="col m3 s12">
                                <label>Packages</label>
                                <select class="form-control packages" name="packages" id="packages">
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
                          <input type="hidden" name="type" value="1">  
                          <button type="submit" class="btn indigo">
                            Filter</button>
                        </div>
                      </div>

                    </form>
                <br>
                <div class="responsive-table">
                      <table id="teststst" class="table myYajra">
                        <thead>
                          <tr>
                            <th>Sr. No</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Enrollment Date & Time</th>
                            <th>Contact No</th>
                            <th>PackageName</th>
                            <th>Sponsor</th>
                            <th>Action</th>
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
              url: "{{ url('admin/affiliate-traffic') }}",
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
            {data: 'customerName', name: 'customerName'},
            {data: 'customerEmail', name: 'customerEmail'}, 
            {data: 'createdAt', name: 'createdAt'},
            {data: 'customerPhone', name: 'customerPhone'}, 
            {data: 'packageName', name: 'packageName'},
            {data: 'sponsorName', name: 'sponsorName'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
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
