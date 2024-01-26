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
                    <li class="tab col m3"><a href="#test2">Unpaid leads</a></li>
                  </ul>
                </div>
                <div id="test1" class="col s12">
                  <br>
                  <p>Search : </p>
                   <form method="get" name="banner-form" id="banner-form" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col m3 s12">
                                <label>From </label>
                                <input type="date" name="fromDate" class="form-control" value="{{isset($_GET['fromDate']) ? $_GET['fromDate'] : ''}}"  placeholder="Enter from date">
                          </div>

                          <div class="col m3 s12">
                                <label>To </label>
                                <input type="date" name="toDate" class="form-control" value="{{isset($_GET['toDate']) ? $_GET['toDate'] : ''}}"  placeholder="Enter to date">
                          </div>
                         
                          <div class="col m3 s12">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}" placeholder="Enter Name">
                          </div>

                            <div class="col m3 s12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{isset($_GET['email']) ? $_GET['email'] : ''}}" placeholder="Enter email address">
                          </div>

                          <div class="col m3 s12">
                                <label>Packages</label>
                                <select class="form-control" name="packages">
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
                          <button type="submit" class="btn indigo">
                            Filter</button>
                        </div>
                      </div>

                    </form>
                <br>
                <div class="responsive-table">
                      <table id="users-list-datatable" class="table">
                        <thead>
                          <tr>
                            <th>Sr. No</th>
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
                          @if(isset($paidLeads) && !empty($paidLeads))
                              @foreach($paidLeads as $row)
                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>{{$row->name}}</td>
                                  <td>{{$row->email}}</td>
                                  <td>{{ date('d-m-Y H:i', strtotime($row->created_at)) }}</td>
                                  <td>{{$row->mobile_no}}</td>
                                  <td>{{$row->packageName}}</td>
                                  <td>{{$row->sponsorName}}</td>
                                  <td>
                                    <a href="{{url('user/traffic-details/'.$row->orderId)}}" class="mb-6 btn waves-effect waves-light purple lightrn-1">View More</a>
                                  </td>
                              </tr>    
                              @endforeach
                          @endif
                          
                        </tbody>
                      </table>
                    </div>

                </div>
              <div id="test2" class="col s12">
                <br>

                <br>
                  <p>Search : </p>
                   <form method="get" name="banner-form" id="banner-form" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col m3 s12">
                                <label>From </label>
                                <input type="date" name="unpaidfromDate" class="form-control" value="{{isset($_GET['unpaidfromDate']) ? $_GET['unpaidfromDate'] : ''}}"  placeholder="Enter from date">
                          </div>

                          <div class="col m3 s12">
                                <label>To </label>
                                <input type="date" name="unpaidtoDate" class="form-control" value="{{isset($_GET['unpaidtoDate']) ? $_GET['unpaidtoDate'] : ''}}"  placeholder="Enter to date">
                          </div>
                         
                          <div class="col m3 s12">
                                <label>Name</label>
                                <input type="text" name="unpaidname" class="form-control" value="{{isset($_GET['unpaidname']) ? $_GET['unpaidname'] : ''}}" placeholder="Enter Name">
                          </div>

                            <div class="col m3 s12">
                                <label>Email</label>
                                <input type="email" name="unpaidemail" class="form-control" value="{{isset($_GET['unpaidemail']) ? $_GET['unpaidemail'] : ''}}" placeholder="Enter email address">
                          </div>

                          <div class="col m3 s12">
                                <label>Packages</label>
                                <select class="form-control" name="unpaidpackages">
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
                          <button type="submit" class="btn indigo">
                            Filter</button>
                        </div>
                      </div>

                    </form>

                    
                <div class="responsive-table">
                      <table id="unpaid-list-datatable" class="table">
                        <thead>
                          <tr>
                          <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>PackageName</th>
                            <th>Reg Date</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>

                        @if(isset($unpaidLeads) && !empty($unpaidLeads))
                              @foreach($unpaidLeads as $row)
                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>{{$row->name}}</td>
                                  <td>{{$row->email}}</td>
                                  <td>{{$row->mobile_no}}</td>
                                  <td>{{$row->packageName}}</td>
                                  <td>{{$row->created_at}}</td>
                                  <td>{{$row->amount}}</td>
                              </tr>    
                              @endforeach
                          @endif
                    
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

@endsection           
