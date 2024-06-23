@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>Team helping bonus</h4>
                 
                    <div class="row">
                     
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
                                     Ref By : {{$row->name}}</p>
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
                                         <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                                      </li>
                                 


                               </ul>
                            </div>
                         </div>
                      </div>
                 
                      @endforeach
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
