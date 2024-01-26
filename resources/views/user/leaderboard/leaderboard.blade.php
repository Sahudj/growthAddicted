@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="card-alert card purple">
                <div class="card-content white-text">
                  <p>Leaderboard</p>
                </div>
              </div>
                
                <div class="row">

                  <div class="col s12 l4">
                       <!-- Recent Buyers -->
                       <div class="card recent-buyers-card animate fadeUp">
                          <div class="card-content">
                             <h4 class="card-title mb-0">Last 7 Days </h4>
                            
                             <ul class="collection mb-0">
                              @if(isset($lastSeven) && !empty($lastSeven))
                                @foreach($lastSeven as $row)
                                  <li class="collection-item avatar">
                                   @if($row->profile_pic)
                                    <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" alt="" class="circle">
                                   @else
                                   <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="" class="circle">
                                   @endif
                                   <p class="font-weight-600" style="margin: 3px; width: 20px;">{{ucfirst($row->name)}}</p>
                                   <P style="font-size: 20px;" class="secondary-content"> <strong>₹ {{$row->amount}}</strong> </P>
                                </li>
                                @endforeach
                              @endif
                             </ul>
                          </div>
                       </div>
                    </div>

                     <div class="col s12 l4">
                       <!-- Recent Buyers -->
                       <div class="card recent-buyers-card animate fadeUp">
                          <div class="card-content">
                             <h4 class="card-title mb-0">Last 30 Days </h4>
                            
                             <ul class="collection mb-0">
                                 @if(isset($currentMonth) && !empty($currentMonth))
                                @foreach($currentMonth as $row)
                                  <li class="collection-item avatar">
                                    @if($row->profile_pic)
                                    <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" alt="" class="circle">
                                   @else
                                   <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="" class="circle">
                                   @endif
                                   <p class="font-weight-600" style="margin: 3px; width: 20px;">{{ucfirst($row->name)}}</p>
                                   <P style="font-size: 20px;" class="secondary-content"><strong>₹ {{$row->amount}}</strong></P>
                                </li>
                                @endforeach
                              @endif
                             </ul>
                          </div>
                       </div>
                    </div>

                    <div class="col s12 l4">
                       <!-- Recent Buyers -->
                       <div class="card recent-buyers-card animate fadeUp">
                          <div class="card-content">
                             <h4 class="card-title mb-0">All Time </h4>
                            
                             <ul class="collection mb-0">
                                 @if(isset($allTime) && !empty($allTime))
                                @foreach($allTime as $row)
                                  <li class="collection-item avatar">
                                    @if($row->profile_pic)
                                    <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" alt="" class="circle">
                                   @else
                                   <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="" class="circle">
                                   @endif
                                   <p class="font-weight-600" style="margin: 3px; width: 20px;">{{ucfirst($row->name)}}</p>
                                   <p class="secondary-content" style="font-size: 20px;"><strong>₹ {{$row->amount}}</strong></p>
                                </li>
                                @endforeach
                              @endif
                             </ul>
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

@endsection           
