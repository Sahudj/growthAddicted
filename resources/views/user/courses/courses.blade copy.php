@extends('layouts.admin')

@section('content')

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
              <?php 
                 function encryptor($action, $string) {
                    $output = false;

                    $encrypt_method = "AES-256-CBC";
                    //pls set your unique hashing key
                    $secret_key = 'aman#$gyan13*&som@$#';
                    $secret_iv = 'aman#$gyan13*&som@$#';

                    // hash
                    $key = hash('sha256', $secret_key);

                    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                    $iv = substr(hash('sha256', $secret_iv), 0, 16);

                    //do the encyption given text/string/number
                    if( $action == 'encrypt' ) {
                        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                        $output = base64_encode($output);
                    }
                    else if( $action == 'decrypt' ){
                        //decrypt the given text/string/number
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                    }

                    return $output;
                  }
              ?>
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

                <h4>My Packages Listing</h4>

                <div class="card-alert card gradient-45deg-purple-deep-orange" style="margin:0px;">
                  <div class="card-content white-text">
                  <p id="blink1"> <strong> YOUR CURRENT PACKAGE : {{$getInfo->name}} </strong> </p>
                  </div>
                </div>

                   <div class="card-panel border-radius-6 white-text gradient-45deg-purple-deep-orange card-animation-2">
                      <h6 ><b><a href="#" class="white-text"><blink> Upgrade Package ! </blink> </a></b></h6>
                      <span>Click on link to upgrade your package and explore more courses.
                      </span>
                      <div class="display-flex justify-content-between flex-wrap">
                        <div class="display-flex align-items-center mt-1">
                        </div>
                        <div class="display-flex right-align social-icon">
                           <span class=" vertical-align-top"><a target="_blank" href="{{url('/#wc-ourcourses-wapper')}}" class="btn waves-effect waves-light purple lightrn-1">Upgrade Now</a></span>
                        </div>
                      </div>
                    </div>

                <div class="row">
                  @if(isset($getCourses) && !empty($getCourses))
                      @foreach($getCourses as $row)
                      <div class="col s12 m4 8">
                        <div class="card">
                          <div class="card-image">
                              <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA 3D 2.png' : (($row->id == 3) ? 'DIDI S PNG 3D.png' : '2-PERSONAL PNG 3D.png') }}" alt="blog"> <span class="card-title"></span>
                          </div>
                          <div class="card-content">
                            <p>
                              {{$row->name}}
                            </p>
                          </div>
                          <div class="card-action">
                            <p>List of courses (Click on links to enter)</p>
                            <hr>
                            <?php 

                              $courses = DB::table('main_course')->where('package_id', $row->id)->get();
                              // $subFolderId =  explode(',', $courses->sub_foldersId) ;
                              // $subFolderName = explode(',', $courses->sub_foldersName);
                              // $folderArr = array_combine($subFolderId, $subFolderName);
                              
                             ?>

                             <ul>
                               @foreach($courses as $row2)
                               <li> 
                              <a href="{{url('user/my-courses/'.encryptor('encrypt', $row->id)).'/'.encryptor('encrypt', $row2->sub_folder_id).'/'.encryptor('encrypt', $row2->sub_folder_name) }}" title="click here to enter into {{$row2->sub_folder_name}}">
                                <div class="card-alert card gradient-45deg-purple-deep-orange" style="margin:0px;">
                                  <div class="card-content white-text">
                                  <p>{{$row2->sub_folder_name}}</p>
                                  </div>
                                </div>
                              </a>
                                </li>
                               @endforeach
                             </ul>

                          </div>
                        </div>
                      </div>
                      @endforeach
                  @endif

        
                  </div>
                </div>
              </div>
             </div>
            </div>
          </div>

@if(auth()->user()->order_status == 1)
    @if(auth()->user()->is_watch_video == 0)
    <div id="intro">
    <div class="row">
        <div class="col s12">

            <div id="img-modal" class="modal white">
                <div class="modal-content">
                    <div class="bg-img-div"></div>
                    <p class="modal-header right modal-close">
                        Skip Intro <span class="right"><i class="material-icons right-align">clear</i></span>
                    </p>
                   <br>
                   <br>
                   <div style="position:relative;">
                  <script type="application/ld+json">{"@context":"https://schema.org","@type":"VideoObject","name":"1 St Step","description":"","thumbnailUrl":[["https://video.gumlet.io/64b7dbbefccf18bce938d682/64d77049f48f277631a83481/thumbnail-1-0.png?v=1691840637933"]],"uploadDate":"2023-08-12T11:43:05.833Z","duration":"PT6M24.149999999999977S","embedUrl":"https://play.gumlet.io/embed/64d77049f48f277631a83481"}</script><div style="position: relative; padding-top: 56.17%">
                    <iframe loading="lazy" title="Gumlet video player" src="https://play.gumlet.io/embed/64d77049f48f277631a83481" style="border:none; position: absolute; top:0; left:0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen>
                    </iframe></div>

                   </div>
                  

                    <form method="post" name="shares" class="form-horizontal" href="javascript:void(0)" onsubmit=" return startVideo()" id="sharesDetailsForm" autocomplete="off">
                          <p>
                            <label>
                              <input type="checkbox" id="radioPrimary1" name="status" value="1" required>
                              <span>I have already watched the video</span>
                            </label>
                          </p>

                           <button type="submit" class="btn indigo align-items-center">
                            Thank You </button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif
      
      <script src="{{url('public/admin/')}}/app-assets/js/scripts/intro.js"></script>

@endsection           
