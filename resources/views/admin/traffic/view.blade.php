@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>View details</h4>
                 
                        <div class="col s12 m6 l6 hide-on-small-only">
                          <div class="card-panel border-radius-6 mt-10 card-animation-1">
                            <a href="#"><img class="responsive-img border-radius-8 z-depth-4 image-n-margin" src="{{url('public/packages/'.$getDetails->thumbnail)}}" alt=""></a>
                            <h6 class="deep-purple-text text-darken-3 mt-5"><a href="#">{{$getDetails->packageName}}</a></h6>

                            <div class="card recent-buyers-card animate fadeUp">
                            <div class="card-content">
                               <ul class="collection mb-0">
                                
                                    <li class="collection-item avatar" style="padding-left: 10px !important;">
                                      <p class="font-weight-600"style="">Sponsor Name</p>
                                      <a href="#" class="secondary-content">{{ ucfirst($getDetails->sponsorName)}}</a>
                                    </li>

                                  <li class="collection-item avatar" style="padding-left: 10px !important;">
                                     <p class="font-weight-600"style="">Name</p>
                                     <a href="#" class="secondary-content">{{ ucfirst($getDetails->name)}}</a>
                                  </li>
                                  <li class="collection-item avatar" style="padding-left: 10px !important;">
                                      <p class="font-weight-600"style="">Email</p>
                                      <a href="#" class="secondary-content">{{ ucfirst($getDetails->email)}}</a>
                                  </li>
                                  <li class="collection-item avatar" style="padding-left: 10px !important;">
                                      <p class="font-weight-600"style="">Enroll Date</p>
                                      <a href="#" class="secondary-content">{{ ucfirst($getDetails->created_at)}}</a>
                                  </li>

                                    <li class="collection-item avatar" style="padding-left: 10px !important;">
                                      <p class="font-weight-600"style="">Contact No</p>
                                      <a href="#" class="secondary-content">{{ ucfirst($getDetails->mobile_no)}}</a>
                                  </li>


                                    <li class="collection-item avatar" style="padding-left: 10px !important;">
                                      <p class="font-weight-600"style="">Package Amount</p>
                                      <a href="#" class="secondary-content">{{ ucfirst($getDetails->amount)}}</a>
                                    </li>
                                    
                                    <li class="collection-item avatar" style="padding-left: 10px !important;">
                                      <p class="font-weight-600"style="">Commission</p>
                                      <a class="secondary-content">
                                          <strong>{{$getDetails->direct}}</strong> 
                                      </a>
                                  </li>
                               </ul>
                            </div>
                         </div>

                      </div>
                    </div>


          <div class="col s12 m12 l4 hide-on-large-only">
            <div id="profile-card" class="card animate fadeRight">
               <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="{{url('public/packages/'.$getDetails->thumbnail)}}" alt="user bg">
               </div>
               <div class="card-content">
                 
                  <div>
                    Package<p class="secondary-content" style="margin:0px !important; color:#5F6EC1;"> {{ ucfirst($getDetails->packageName)}} </p>
                  </div>
                  <hr>
                  <div>
                    Name<p class="secondary-content" style="margin:0px !important; color:#5F6EC1;"> {{ ucfirst($getDetails->name)}} </p>
                  </div>
                 <hr>
                  <div>
                    Email<p class="secondary-content" style="margin:0px !important; color:#5F6EC1;"> {{ ucfirst($getDetails->email)}} </p>
                  </div>
                    <hr>
                  <div>
                    Contact No<p class="secondary-content" style="margin:0px !important; color:#5F6EC1;"> {{ ucfirst($getDetails->mobile_no)}} </p>
                  </div>
                    <hr>
                  <div>
                    Package Amount<p class="secondary-content" style="margin:0px !important; color:#5F6EC1; font-size: 20px !important"> {{ ucfirst($getDetails->amount)}} </p>
                  </div>
                    <hr>
                  <div>
                    Commission<p class="secondary-content" style="margin:0px !important; color:#5F6EC1; font-size: 20px !important"> {{$getDetails->amount*80/100}} </p>
                  </div>
                
               </div>
               <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Roger Waters <i class="material-icons right">close</i>
                  </span>
                  <p>Here is some more information about this card.</p>
                  <p><i class="material-icons">perm_identity</i> Project Manager</p>
                  <p><i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                  <p><i class="material-icons">email</i> yourmail@domain.com</p>
                  <p><i class="material-icons">cake</i> 18th June 1990</p>
                  <p></p>
                  <p><i class="material-icons">airplanemode_active</i> BAR - AUS</p>
                  <p></p>
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

@endsection           
