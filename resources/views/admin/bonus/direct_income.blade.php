@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>Direct Sale by User</h4>

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

                      <form method="get" name="banner-form" id="banner-form" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col m3 s12">
                                <label>From </label>
                                <input type="date" name="fromDate" class="form-control" value="{{isset($_GET['fromDate']) ? $_GET['fromDate'] : ''}}"  placeholder="Enter from date" required>
                          </div>

                          <div class="col m3 s12">
                                <label>To </label>
                                <input type="date" name="toDate" class="form-control" value="{{isset($_GET['toDate']) ? $_GET['toDate'] : ''}}"  placeholder="Enter to date" required>
                          </div>  

                          <div class="col m3 s12">
                                <label>Package </label>
                                <select class="form-control" name="packageId">
                                  <option value="">Please Select</option>
                                  @foreach($packagesArr as $row)
                                  <option value="{{$row->id}}" {{(isset($_GET['packageId']) && $_GET['packageId'] == $row->id) ? "selected" : ''}} >{{$row->name}}</option>
                                  @endforeach
                                </select>
                          </div> 

                          <div class="col m3 s12">
                            <br><br>
                            <button type="submit" class="btn indigo">Filter</button>
                          </div>
                        </div>
                    </form>
                       
                           @if(isset($getDetails) && count($getDetails) > 0)

                           <div class="row">
                              <div class="col s4">
                                 @foreach($getDetails as $row)
                                  @if($row->packageId == 2)
                                   <div class="card recent-buyers-card animate fadeUp">
                                      <div class="card-content">
                                        <div class="card-alert card purple">
                                          <div class="card-content white-text">
                                            <p>{{$row->packageName}}</p>
                                          </div>
                                        </div>

                                         <hr>
                                        
                                         <ul class="collection mb-0">
                                                <li class="collection-item avatar">
                                                     @if($row->profile_pic)
                                                        <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar">
                                                     @else
                                                        <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                                     @endif
                                                   <p class="font-weight-600" style="width: 30px;">{{ucfirst($row->name)}}</p>
                                                   <p class="medium-small">{{$row->referral_code}}</p>
                                                   <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                                                </li>
                                         </ul>
                                      </div>
                                   </div>
                                  @endif
                                @endforeach
                              </div>
                               
                               <div class="col s4">
                                 @foreach($getDetails as $row)
                                  @if($row->packageId == 3)
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
                                        
                                         <ul class="collection mb-0">
                                                <li class="collection-item avatar">
                                                     @if($row->profile_pic)
                                                        <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar">
                                                     @else
                                                        <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                                     @endif
                                                   <p class="font-weight-600" style="width: 30px;">{{ucfirst($row->name)}}</p>
                                                   <p class="medium-small">{{$row->referral_code}}</p>
                                                   <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                                                </li>
                                         </ul>
                                      </div>
                                   </div>
                                  @endif
                                @endforeach
                              </div>
                              <div class="col s4">
                                 @foreach($getDetails as $row)
                                  @if($row->packageId == 4)
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
                                        
                                         <ul class="collection mb-0">
                                                <li class="collection-item avatar">
                                                     @if($row->profile_pic)
                                                        <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar">
                                                     @else
                                                        <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                                                     @endif
                                                   <p class="font-weight-600" style="width: 30px;">{{ucfirst($row->name)}}</p>
                                                   <p class="medium-small">{{$row->referral_code}}</p>
                                                   <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                                                </li>
                                         </ul>
                                      </div>
                                   </div>
                                  @endif
                                @endforeach
                              </div>
                           </div>
                           
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
