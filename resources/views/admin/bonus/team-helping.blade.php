@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>Team Profile</h4>

                      <div class="row">

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
                        <div class="col s12">
                          <ul class="tabs">
                            <li class="tab col m3"><a class="active" href="#test1">Bonus</a></li>
                            <li class="tab col m3"><a  href="#test2">Team Member</a></li>
                            <li class="tab col m3"><a  href="#test3">Setting</a></li>
                            <li class="tab col m3"><a  href="#test4">Sale</a></li>
                          </ul>
                        </div>
                        <div id="test1" class="col s12">
                          <div class="row">
                          <?php $userAmount = []; ?>
                           @if(isset($getDetails) && count($getDetails) > 0)
                           @foreach($getDetails as $row)
                                <div class="col s12 l4">
                                   <!-- Recent Buyers -->
                                   <div class="card recent-buyers-card animate fadeUp">
                                      <div class="card-content">
                                        <div class="card-alert card purple">
                                          <div class="card-content white-text">
                                            <p>{{$row->packageName}}</p>
                                          </div>
                                        </div>

                                        <div class="card-alert card gradient-45deg-purple-deep-orange">
                                            <div class="card-content white-text">
                                              <p>
                                                @if($userId == $row->userId)
                                                  Ref By : SELF
                                                @else
                                                  Ref By : {{ucfirst($row->name)}}
                                                @endif
                                               
                                               </p>
                                            </div>
                                          </div>
                                       
                                         <hr>
                                        
                                  <?php
                                  
                                    $sql = "SELECT affiliate_comm.id,affiliate_comm.affiliate_id,affiliate_comm.amount,users.name,users.profile_pic, users.referral_code, users.id as userId, users.created_at  
                                    FROM affiliate_comm left join users on users.id = affiliate_comm.user_id 
                                    WHERE affiliate_id = $row->id";
                                    $result = DB::select($sql); ?>

                                         <ul class="collection mb-0">
                                            @if(isset($result) && !empty($result))
                                              @foreach($result as $row2)
                                              <?php 
                                                  if($row2->userId == $userId){
                                                    $userAmount[$row->package_id] = $row2->amount;    
                                                  }
                                                ?>
                                                <li class="collection-item avatar">
                                                     @if($row2->profile_pic)
                                                        <img src="{{url('public/profile_pic/'.$row2->profile_pic)}}" class="circle" alt="avatar">
                                                     @else
                                                        <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                                     @endif
                                                   <p class="font-weight-600" style="width: 30px;">{{ucfirst($row2->name)}}</p>
                                                   <p class="medium-small">{{$row2->referral_code}}</p>
                                                   <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row2->amount}}</a>
                                                </li>
                                              @endforeach
                                          @endif


                                         </ul>
                                      </div>
                                   </div>
                                </div>
                           
                                @endforeach

                                @else
                                   <div class="card-alert card red">
                                      <div class="card-content white-text">
                                        <p>DANGER : No records found </p>
                                      </div>
                                      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>

                                @endif
                             </div>
                        </div>

                        <div id="test2" class="col s12">
                          <div class="col s12 l6">
                          <?php 
                             (count($teamCountRes) > 0) ? asort($teamCountRes) : []; 

                              if(count($teamCountRes) > 0){
                          
                                $getUsers = DB::table('users')->select('name', 'profile_pic', 'referral_code', 'created_at')->whereIn('id', $teamCountRes)->get();  
                              
                                foreach ($getUsers as $row) { ?>
                                  <div class="row">
                                    <div class="col s12 center-align" style="margin-bottom:10px;">
                                        @if($row->profile_pic)
                                            <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="responsive-img circle z-depth-5" width="50" alt="avatar">
                                         @else
                                            <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="responsive-img circle z-depth-5" width="50" alt="avatar">
                                         @endif
                                      <br>
                                     <h6><a> {{ucfirst($row->name)}}</a></h6>  
                                    </div>
                                  </div>
                                   <div class="row mt-5">
                                    <div class="col s6">
                                      <h6><a>Refferal Code</a></h6>
                                      <h6 class="m-0">{{$row->referral_code}}</h6>
                                    </div>
                                    <div class="col s6">
                                      <h6><a>Joining Date</a></h6>
                                      <h6 class="m-0">{{$row->created_at}}</h6>
                                    </div>
                                  </div>
                                  <hr>
                            <?php    }
                              }
                          ?>

                        </div>
                      </div>


                        <div id="test3" class="col s12">
                          
                          <div class="card-alert card red">
                              <div class="card-content white-text">
                                <p>DANGER : If you will change sponsor then your whole teams will be shift to that user</p>
                              </div>
                              <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                        <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/shift-team')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="row">
                      
                          <div class="col s6">
                            <div class="form-group">
                              <label> Select User </label>
                              <select class="form-control" name ="user" required>
                               <option value="">Please select</option> 
                              @foreach($usersListing as $row)
                                  <option value="{{$row->id}}" >{{$row->name}}</option>
                              @endforeach
                              </select>

                              @error('user')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>    
                          </div>   

                        </div>
                          

                        <div class="row">    
                          <div class="col s12">
                            <input type="hidden" name="usersId" value="{{ json_encode($teamCountArr) }}">
                            <input type="hidden" name="currentUser" value="{{ $userId }}">
                          <button type="submit" class="btn indigo">
                            Shift Team</button>
                        </div>
                        </div>
                          
                      </form>
                     
                        </div>



                        <div id="test4" class="col s12">
                          
                        <div id="chart-dashboard">
                              <div class="row">
                                 <div class="col s12 m8 l8">
                                    <div class="card animate fadeUp">
                                          <?php 
                                           $packagesDataArr = [];
                                           foreach ($allpackages as $key => $row) {
                                              foreach ($userAmount as $key => $row2) {
                                                if($key == $row->id){
                                                  $packagesDataArr[$row->id] = $row2;
                                                }else{
                                                  $packagesDataArr[$row->id] = 0;
                                                }
                                              }
                                             
                                            } 
                                          
                                          ?>
                                      
                                       <div class="card-content">
                                           <div class="col s12 m3 l6">
                                             <div id="doughnut-chart-wrapper">
                                                <canvas id="doughnut-chart" height="200" width="200"></canvas>
                                                <div class="doughnut-chart-status" style="top: -152px !important; font-size: 20px;">
                                                   <p class="center-align font-weight-600 mt-4">₹{{array_sum($packagesDataArr)}}</p>
                                                   <p class="ultra-small center-align font-weight-600">Total Earning</p>
                                                </div>
                                             </div>
                                          </div>

                                    
                                         
                                       </div>
                                      
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                     
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
        function copyText(text){
        var inp =document.createElement('input');
        document.body.appendChild(inp)
        inp.value = text;
        inp.select();
        document.execCommand('copy',false);
        inp.remove();
}

      </script>


 <script src="{{url('public/admin/')}}/app-assets//vendors/chartjs/chart.min.js"></script>

<script>
// Dashboard - Analytics
//----------------------

(function (window, document, $) {

   var doughnutSalesChartCTX = $("#doughnut-chart");
   var browserStatsChartOptions = {
      cutoutPercentage: 70,
      legend: {
         display: true
      }
   };

   var datarr =  "<?php echo ($packages->name) ?>";

   var doughnutSalesChartData = {
      labels: [ <?php echo ($packages->name) ?> ],
      datasets: [
         {
            label: "Sales",
            data: [<?php echo implode(',', $packagesDataArr) ; ?>],
            backgroundColor: ["#4caf50", "#46BFBD", "#FDB45C", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
         }
      ]
   };

   var doughnutSalesChartConfig = {
      type: "doughnut",
      options: browserStatsChartOptions,
      data: doughnutSalesChartData
   };


   window.onload = function () {
      var doughnutSalesChart = new Chart(doughnutSalesChartCTX, doughnutSalesChartConfig);
      browserStatsChart = new Chart(browserStatsChartCTX, browserStatsChartConfig);
      var countryRevenueChart = new Chart(countryRevenueChartCTX, countryRevenueChartConfig);
   };

})(window, document, jQuery);
   </script>
@endsection           
