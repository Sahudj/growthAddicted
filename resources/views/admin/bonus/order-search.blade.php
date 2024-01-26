@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>Get Specific order details</h4>

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
                       
                            <div class="col-lg-12">
                              <form method="get" name="banner-form" id="banner-form" action="{{url('admin/search-order')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                  <div class="col s6">
                                      <label>Order Id <sup style="color:red;">*</sup> </label>
                                        <input type="number" name="orderId" class="form-control @error('orderId') is-invalid @enderror" value="{{isset($_GET['orderId']) ? $_GET['orderId'] : '' }}" placeholder="Enter Order Id" required>
                                        @error('orderId')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                  </div>
                                </div>
                                <br>
                              <div class="row">
                                <div class="col s12 display-flex justify-content-end">
                                  <button type="submit" class="btn indigo">
                                    Search</button>
                                </div>
                              </div>
                            </form>
                          </div>
                      
                      </div>
                 
                      <?php
                        if(isset($_GET['orderId']) && !empty($_GET['orderId'])){
                          $orderId = $_GET['orderId'];
                          
                          $getDetails = DB::table('orders')->select('users.profile_pic','users.created_at','users.order_status','referral_code','orders.customerName','orders.customerPhone','orders.customerEmail','orders.amount','orders.status_id','orders.user_id', 'orders.paymentMode','orders.ref_by','orders.referenceId','packages.name','packages.image as packageImage')
                          ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
                          ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                          ->where('orders.id', $orderId)
                          ->first();


                          $results = DB::table('affiliate')
                            ->select('affiliate.id','affiliate_comm.user_id','affiliate_comm.amount','affiliate_comm.company_amount', 'affiliate_comm.timestamp')
                            
                            ->addSelect(['name' => DB::table('users')->select('name')
                               ->whereColumn('affiliate_comm.user_id', 'users.id')
                                ->limit(1)
                            ])

                            ->addSelect(['email' => DB::table('users')->select('email')
                               ->whereColumn('affiliate_comm.user_id', 'users.id')
                                ->limit(1)
                            ])

                            ->addSelect(['mobile_no' => DB::table('users')->select('mobile_no')
                               ->whereColumn('affiliate_comm.user_id', 'users.id')
                                ->limit(1)
                            ])


                            ->addSelect(['profile_pic' => DB::table('users')->select('profile_pic')
                               ->whereColumn('affiliate_comm.user_id', 'users.id')
                                ->limit(1)
                            ])

                            ->addSelect(['referral_code' => DB::table('users')->select('referral_code')
                               ->whereColumn('affiliate_comm.user_id', 'users.id')
                                ->limit(1)
                            ])
                            ->leftJoin('users', 'affiliate.user_id', '=', 'users.id')
                            ->leftJoin('orders', 'affiliate.order_id', '=', 'orders.id')
                            ->leftJoin('affiliate_comm', 'affiliate.id', '=', 'affiliate_comm.affiliate_id')
                            ->where('affiliate.order_id', $orderId)
                            ->get();
                            //echo "<pre>"; print_r($results); die();
                           ?>

                           <div class="row">

                            <div class="col s8">
                                   <div class="card recent-buyers-card animate fadeUp">
                                      <div class="card-content">
                                        <div class="card-alert card purple">
                                          <div class="card-content white-text">
                                            <p>{{$getDetails->name}} Order Id - {{$orderId}} </p>
                                          </div>
                                        </div>
                                        <p class="font-weight-600" >Purchasing Details</p>
                                          <ul class="collection mb-0">
                                              <li class="collection-item avatar">
                                                  @if($getDetails->profile_pic)
                                                    <img src="{{url('public/profile_pic/'.$getDetails->profile_pic)}}" class="circle" alt="avatar">
                                                   @else
                                                    <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                                  @endif
                                                  
                                                  <p class="font-weight-600">{{ucfirst($getDetails->customerName)}}</p>
                                                  <p class="font-weight-600">{{ucfirst($getDetails->customerEmail)}}</p>
                                                  <p class="font-weight-600">{{ucfirst($getDetails->customerPhone)}}</p>
                                                  <p class="font-weight-600">Profile Status - {{($getDetails->order_status == 1) ? "Active" : "InActive" }} </p>
                                                  <p class="font-weight-600">Payment Mode - {{$getDetails->paymentMode }} </p>
                                                  <p class="medium-small">{{$getDetails->created_at }}</p>
                                                  <a href="#" class="secondary-content" style="font-size: 20px;">₹ {{$getDetails->amount}}</a>
                                                </li>
                                         </ul>
                                         <hr>
                                        <p class="font-weight-600" >Sponsor Details</p>

                                        @if(isset($results) && !empty($results))
                                          @foreach($results as $row)

                                            <ul class="collection mb-0">
                                              <li class="collection-item avatar">
                                                  @if($row->profile_pic)
                                                    <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar">
                                                   @else
                                                    <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                                  @endif
                                                  <p class="font-weight-600">{{ucfirst($row->name)}}</p>
                                                  <p class="font-weight-600">{{$row->email}}</p>
                                                  <p class="font-weight-600">{{$row->mobile_no}}</p>
                                                  <p class="font-weight-600">{{$row->referral_code}}</p>
                                                  <a href="#" class="secondary-content" style="font-size: 20px;">₹ 
                                                    {{$row->amount}}</a>
                                              </li>

                                            <hr>
                                            @if($row->company_amount != 0)
                                              <li class="collection-item avatar">
                                            
                                                  <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                            
                                                  <p class="font-weight-600">Admin</p>
                                                 
                                                  <a href="#" class="secondary-content" style="font-size: 20px;">₹ 
                                                    {{$row->company_amount}}</a>
                                              </li>
                                            @endif

                                         </ul>
                                          @endforeach
                                        @endif


                                       </div>
                                     </div>
                                   </div>
                             
                           </div>


                       <?php } ?>



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


 
@endsection           
