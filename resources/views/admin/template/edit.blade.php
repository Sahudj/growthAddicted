@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                 
                    <div class="row">
                     
                       <div class="col s6">
                         <h5>Direct Income</h5>
                         <hr>
                         @foreach($getDetails as $row)
                          @if($row->comm_status == 1)
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
                                     Ref By : 
                                     @if($row->send_by != '')
                                     <?php 
                                     $sponsor = DB::table('users')->select('name')->where('id', $row->send_by)->first(); ?>
                                     @endif
                                     {{$sponsor->name}} - {{($row->comm_status == 1 ? "(Direct Income)" : "(Passive Income)")}} </p>
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
                                         <p class="font-weight-600" style="width: 30px;">{{$row->name}}</p>
                                         <p class="medium-small">{{$row->referral_code}}</p>
                                         <p class="medium-small">{{ date('d-m-Y H:i A', $row->timestamp) }}</p>
                                         <p class="medium-small"> <strong>Order Id #{{$row->order_id}}</strong> </p>
                                          <a class="show_confirm" href="{{url('admin/delete-payout/'.$row->id)}}"><i class="material-icons dp48">delete</i></a>
                                          <a class="edit_confirm" href="{{url('admin/edit-payout/'.$row->id)}}"><i class="material-icons dp48">edit</i></a>
                                         <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                                      </li>
                                 


                               </ul>
                            </div>
                         </div>
                         @endif
                          @endforeach
                       </div>
                       <div class="col s6">
                        <h5>Passive Income</h5>
                        <hr>
                          @foreach($getDetails as $row)
                          @if($row->comm_status == 2)
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
                                     Ref By : 
                                     @if($row->send_by != '')
                                     <?php 
                                     $sponsor = DB::table('users')->select('name')->where('id', $row->send_by)->first(); ?>
                                     @endif
                                     {{$sponsor->name}} - {{($row->comm_status == 1 ? "(Direct Income)" : "(Passive Income)")}} </p>
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
                                        <p class="font-weight-600" style="width: 30px;">{{$row->name}}</p>
                                        <p class="medium-small">{{$row->referral_code}}</p>
                                        <p class="medium-small">{{ date('d-m-Y H:i A', $row->timestamp) }}</p>
                                        <p class="medium-small"> <strong>Order Id #{{$row->order_id}}</strong> </p>
                                        <a class="show_confirm" href="{{url('admin/delete-payout/'.$row->id)}}"><i class="material-icons dp48">delete</i></a>
                                        <a class="edit_confirm" href="{{url('admin/edit-payout/'.$row->id)}}"><i class="material-icons dp48">edit</i></a>
                                        <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                                      </li>
                                 


                               </ul>
                            </div>
                         </div>
                         @endif
                          @endforeach
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

@endsection           
