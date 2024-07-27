<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/ourcustom/ourcustom.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <title>Growth Addicted/Courses</title>
  <style>
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <div class="courses-page">


    <div class="course-bottom-nav">
      <div class="bottom-nav-wrap">
        <ul class="menu">
          <li>
            <a href="{{url('/')}}">
              <span class="material-symbols-outlined">
                home
              </span>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="{{url('/')}}">
              <span class="material-symbols-outlined">
                school
              </span>
              <p>My Learning</p>
            </a>
          </li>
          <li>
            <a href="{{url('/user/dashboard')}}">
              <span class="material-symbols-outlined">
                handshake
              </span>
              <p>Dash</p>
            </a>
          </li>

          @if(auth()->user()->profile_pic)
          <li>
            @if(auth()->user()->order_status == 1)
            <a href="{{url('/user/profile')}}">
              <img src="{{url('public/profile_pic/'.auth()->user()->profile_pic)}}" alt="avatar">
              <p>Profile</p>
            </a>
            @endif
          </li>
          @else
          <li>
            <a href="{{url('/user/profile')}}">
              <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar">
              <p>Profile</p>
            </a>
          </li>
          @endif

        </ul>
      </div>
    </div>

    <?php
    function encryptor($action, $string)
    {
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
      if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
      } else if ($action == 'decrypt') {
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
          <i class="material-icons">check</i> SUCCESS : {{ $message }}.
        </p>
      </div>
      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    @endif
    @endif


    <div class="courses-page-wrap">
      <div class="courses-nav">
        <div class="cours-nav-wrap">
          <div class="left">
            <h4>Hello 👋, {{ ucfirst(auth()->user()->name)}}</h4>
            <p>Let's Start <span id="spin"></span>!</p>
          </div>
          <div class="right">
            <ul class="web-right-menu">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('/')}}">My Learning</a></li>
              <li><a href="{{url('/user/dashboard')}}">Dash</a></li>
              @if(auth()->user()->profile_pic)
              <li>
                @if(auth()->user()->order_status == 1)
                <a href="{{url('/user/profile')}}">
                  <img src="{{url('public/profile_pic/'.auth()->user()->profile_pic)}}" alt="avatar">
                  <p>Profile</p>
                </a>
                @endif
              </li>
              @else
              <li>
                <a href="{{url('/user/profile')}}">
                  <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar">
                  <p>Profile</p>
                </a>
              </li>
              @endif
            </ul>
            <ul class="mob-right-menu">
              <li class="lnk-with-drop">
                <a href="#"><span class="material-symbols-outlined">more_vert</span></a>
                <div class="navdroplinks">
                  <a href="#" style="background: var(--ter-clr);color:white;border-radius:3px;"> <span class="material-symbols-outlined">package_2</span>Growth Plus +</a>
                  <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">settings</span> Settings</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="courses-carousel">
        <div class="carousel-wrap">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="cours-car-card">
                  <img src="{{url('public/admin/')}}/app-assets/images/user/banner2.jpeg" alt="card">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="cours-car-card">
                  <img src="https://picsum.photos/500/500?random=1" alt="card">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="cours-car-card">
                  <img src="https://picsum.photos/500/500?random=1" alt="card">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="cours-car-card">
                  <img src="https://picsum.photos/500/500?random=1" alt="card">
                </div>
              </div>
            </div>
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>

      <div class="course-search-bar">

        <form method="GET" action="{{ url('user/search/course') }}">
          <div class="search-bar">
            <input type="text" name="search" placeholder="Search For Courses Here" value="{{ request()->input('search') }}">
            <button type="submit">
              <span class="material-symbols-outlined">
                search
              </span>
            </button>
          </div>
        </form>
      </div>

      <div class="filters-wrap">
        <div class="title">
          <h2>Categories</h2>
          <a href="#">See More</a>
        </div>
        <div class="filters">
          <a href="{{ url('user/search/course?category=Marketing') }}" class="filter">
            <span class="material-symbols-outlined">
              laptop_windows
            </span>
            Marketing
          </a>
          <a href="{{ url('user/search/course?category=Designing') }}" class="filter">
            <span class="material-symbols-outlined">
              draw
            </span>
            Designing
          </a>
          <a href="{{ url('user/search/course?category=Buisness') }}" class="filter">
            <span class="material-symbols-outlined">
              storefront
            </span>
            Business
          </a>
          <a href="{{ url('user/search/course?category=phsycology') }}" class="filter">
            <span class="material-symbols-outlined">
              mindfulness
            </span>
            Phsycology
          </a>

        </div>
      </div>

      <div class="bundles-section">
        <div class="bundles-wrap">
          <div class="title">
            <h2>My Bundles</h2>
          </div>

          <div class="bundles-grid">
            @if(isset($getCourses) && !empty($getCourses))
            @foreach($getCourses as $row)
            <div class="bundlecard">
              <div class="top">
                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'alphabundle.png' : (($row->id == 3) ? 'digibundle.png' : 'personlbundle.png') }}" alt="blog"> <span class="card-title"></span>
              </div>
              <div class="bot">
                <div class="course-name">{{$row->name}}</div>
                <div class="infos">
                  @if($row->id == 2)
                  <p>5 courses</p>
                  <p>8+ Hours</p>
                  @elseif($row->id == 3)
                  <p>4 courses</p>
                  <p>15+ Hours</p>
                  @elseif($row->id == 7)
                  <p>10 courses</p>
                  <p>80+ Hours</p>
                  @else
                  <p>6 courses</p>
                  <p>36+ Hours</p>
                  @endif
                </div>
                <div class="target"></div>
                <div class="continue-btn">
                  <a href="{{ url('user/subcourses/'.$row->id.'/'.$row->name) }}">LEARN NOW</a>
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


  <!-- <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-content">

          <h4>My Packages Listing</h4>

          <div class="card-alert card gradient-45deg-purple-deep-orange" style="margin:0px;">
            <div class="card-content white-text">
              <p id="blink1"> <strong> YOUR CURRENT PACKAGE : {{$getInfo->name}} </strong> </p>
            </div>
          </div>

          <div class="card-panel border-radius-6 white-text gradient-45deg-purple-deep-orange card-animation-2">
            <h6><b><a href="#" class="white-text">
                  <blink> Upgrade Package ! </blink>
                </a></b></h6>
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
  </div> -->
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
              <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "VideoObject",
                  "name": "1 St Step",
                  "description": "",
                  "thumbnailUrl": [
                    ["https://video.gumlet.io/64b7dbbefccf18bce938d682/64d77049f48f277631a83481/thumbnail-1-0.png?v=1691840637933"]
                  ],
                  "uploadDate": "2023-08-12T11:43:05.833Z",
                  "duration": "PT6M24.149999999999977S",
                  "embedUrl": "https://play.gumlet.io/embed/64d77049f48f277631a83481"
                }
              </script>
              <div style="position: relative; padding-top: 56.17%">
                <iframe loading="lazy" title="Gumlet video player" src="https://play.gumlet.io/embed/64d77049f48f277631a83481" style="border:none; position: absolute; top:0; left:0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen>
                </iframe>
              </div>

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
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
</body>

</html>