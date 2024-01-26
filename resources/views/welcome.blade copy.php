@extends('layouts.frontend.index')

@section('content')

  <style>
        .btn-small.btn-course{
            max-width : 160px !important;
        }

        .wc-class-img.wc-cls-5d{
            background: #ff2850 !important;
        }
    </style>
<!-- banner section start -->
        <div class="wc-banner-wrapper" style="overflow-x:hidden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="2000">
                        <div class="wc-banner-text">
                            <h1>start where you're, we'll take you where you want to go !</h1>
                            <p>"YOUR GROWTH. OUR PASSION"</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-left"
                        data-aos-duration="2000">
                        <div class="wc-banner-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/banner-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner section end -->

        <!-- courses section start -->
        <div class="wc-ourcourses-wapper">
            <div class="arroe-img">
                <img src="{{url('public/frontend/home/')}}/assets/images/plane-paper.png" alt="">
            </div>
            <div class="container">
                <div class="wc-section-title wc-edu-00">
                    <h2>We are on a mission to educate the world</h2>
                    <p>
                        Our Courses
                    </p>
                </div>

                 <?php 
                $packageId = '';
                $orderStatus = '';    
                ?> 
              
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
                    $allPackages = DB::table('packages')->select('*')->where('status', 1)->get();
                       
                    ?>

                    @auth()
                    
                    <?php
                        $packageId = (auth()->user()->package_id) ? auth()->user()->package_id : 0;
                        $orderStatus = auth()->user()->order_status;
                        $packages = DB::table('packages')->select(DB::raw('group_concat(id) as packageId'))->where('id', '>', $packageId)->first(); 
                        $tempArr = !empty($packages->packageId) ? explode(',', $packages->packageId) : [] ;
                    ?>
                @endauth()

                <div class="row" id="wc-ourcourses-wapper">

                     @foreach($allPackages as $row)   

                    <div class="col-lg-4 col-md-6 col-md-12" style="padding: 10px;">
                        <div class="wc-class-inner aos-init aos-animate" data-aos="{{($row->id == 2) ? 'fade-right' : (($row->id == 3) ? 'fade-down' : 'fade-left') }}" data-aos-duration="{{($row->id == 2) ? 2000 : (($row->id == 3) ? 900 : 2000) }}">
                            <div class="{{($row->id == 2) ? 'wc-class-img' : (($row->id == 3) ? 'wc-class-img wc-cls-3d' : (  ($row->id == 4) ? 'wc-class-img wc-cls-4d' : 'wc-class-img wc-cls-5d' )) }}">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA 3D 2.png' : (($row->id == 3) ? 'DIDI S PNG 3D.png' : ( ($row->id == 4) ? '2-PERSONAL PNG 3D.png' : 'iconic.jpeg' ) ) }}" alt="blog">
                                @if($row->package_status == 1)
                                <p class="new">Best Package</p>
                                @endif
                            </div>
                            <div class="{{($row->id == 2) ? 'wc-class-data' : (($row->id == 3) ? 'wc-class-data wc-text-hover' : 'wc-class-data wc-cls-hover1') }}">
                                <h4>{{$row->name}}</h4>
                                @if($row->id == 2)
                                    <p>2 course</p>
                                @elseif($row->id == 3)
                                    <p>3COURSES + 2 BONUS COURSES </p>
                                @elseif($row->id == 4)
                                    <p>5 COURSES, 3+2 BONUS COURSES</p> 
                                @else
                                    <p>10 COURSES + 11 BONUS COURSES</p>
                                @endif
                                
                                @if(!empty($tempArr) && $orderStatus == 1 && in_array($row->id,$tempArr))
                                    <?php 
                                        $getNewPrice = DB::table('package_comm')->where(['from_package' => $packageId, 'to_package_id'=> $row->id])->first();
                                    ?>
                                @if(auth()->user()->role != 1)<p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$getNewPrice->amount}}</span></p>
                                @endif
                                    <div class="btn-small btn-course">
                                        
                                        <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                                            <a href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();">Upgrade Now</a>
                                        </form>
                                    </div>
                                
                                    @elseif(auth()->user() && $orderStatus == 0)
                                    <p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>
                                    <div class="btn-small btn-course">
                                        <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                                            <a href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();">BUY NOW</a>
                                        </form>
                                    </div>    
                                 @elseif($packageId != $row->id && $packageId < $row->id)
                                 <p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>
                                <div class="btn-small btn-course">
                                         <a href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}">BUY NOW </a>  
                                     </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- courses section end -->
        <!-- about our missiong section start -->
        <div class="wc-about-wrapper">
            <div class="container">
                <div class="wc-section-title">
                    <h2 class="title">A platform that supports you end-to-end</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 aos-init aos-animate" data-aos="fade-up"
                        data-aos-duration="700">
                        <section class="pnt_faq_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb_30">
                                        <div class="pnt_faqs_section">
                                            <a class="video_popup"
                                                href="

                                            https://media.istockphoto.com/videos/university-library-gifted-beautiful-black-girl-sitting-at-the-desk-video-id1214253752">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/girl.jpg" alt="" />
                                                <div class="video_icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        preserveAspectRatio="xMidYMid" viewBox="0 0 25 30">
                                                        <path
                                                            d="M23.825,12.873 L3.825,0.373 C3.054,-0.108 2.082,-0.137 1.288,0.307 C0.493,0.748 -0.000,1.585 -0.000,2.493 L-0.000,27.492 C-0.000,28.402 0.493,29.238 1.288,29.678 C1.665,29.889 2.083,29.993 2.499,29.993 C2.960,29.993 3.420,29.866 3.825,29.613 L23.825,17.113 C24.555,16.655 25.000,15.855 25.000,14.993 C25.000,14.131 24.555,13.330 23.825,12.873 Z" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- about our missiong section start -->
        <div class="wc-mission-wrapper" style="overflow-x:hidden">
            <div class="container">
                <div class="wc-section-title">
                    <h2 class="title">ABOUT OUR MISSION</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="2000">
                        <div class="wc-mission-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-left"
                        data-aos-duration="2000">
                        <div class="wc-imssion-text00">
                            <h3>Learning at Every Step</h3>
                            <p>Growth addtcted mission is to help learners of all ages reach their full potential
                                through inspired teaching and personalized learning. We do this by providing clear
                                pathways for learners to expand their skills, explore their options, and change their
                                lives</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="wc-browth-img">
               <img src="{{url('public/frontend/home/')}}/assets/images/1x/1x/collection-pattern-1.png" alt="">
            </div>

        </div>
        <!-- about our missiong section end-->
        <!-- Training section start -->
        <div class="wc-training-wrapper wc-training-0010" >
            <div class="container">
                <div class="wc-section-title">
                    <h2 class="title">Our Training Programs</h2>
                </div>
                <section class="testimonials aos-init aos-animate" data-aos="fade-down" data-aos-duration="1000">
                    <div class="inner-testimonials">
                        <div class="owl-carousel custome_slide" id="slide-testimonal2">
                            <div class="test_img">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/growth.png" alt="">
                                </div>
                                <div class="testimonial_detail">
                                    <h4>Push The Limits</h4>
                                    <p>There is no finish line. It’s a
                                        continuous journey and I'll
                                        always looking to push your
                                        limits.</p>
                                </div>
                            </div>
                            <div class="test_img">
                                <div class="main-reviewimage ">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/saving.png" alt="">
                                </div>
                                <div class="testimonial_detail">
                                    <h4>Financial Education</h4>
                                    <p>Financial education is as
                                        valuable as money.</p>
                                </div>
                            </div>
                            <div class="test_img">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/coins.png" alt="">
                                </div>
                                <div class="testimonial_detail">
                                    <h4>Business Automation</h4>
                                    <!-- <p>We'll take your business on
                                   automation mode- You
                                   should not work according
                                   to the business, Business
                                   should work according to you
                                </p> -->
                                    <p>We'll take your business on
                                        automation mode- You
                                        should not work according
                                        to the business, Business
                                        should work according to
                                        you.
                                    </p>
                                </div>
                            </div>
                            <div class="test_img">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/sales.png" alt="">
                                </div>
                                <div class="testimonial_detail">
                                    <h4>Sales Mastry</h4>
                                    <!-- <p>Financial Education is more valuable  than money </p> -->
                                    <p>Selling is the backbone of
                                        any business- Selling is an
                                        art and artist can never
                                        sleep broke.</p>
                                </div>
                            </div>
                            <div class="test_img">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/inspiration.png" alt="">
                                </div>
                                <div class="testimonial_detail">
                                    <h4>Content Creation Era</h4>
                                    <!-- <p>Financial Education is more valuable  than money </p> -->
                                    <p>In the new era of 21st
                                        century content is not the
                                        king , It's a kingdom & you
                                        should know how to create
                                        kingdom.</p>
                                </div>
                            </div>
                            <div class="test_img">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/marketing.png" alt="">
                                </div>
                                <div class="testimonial_detail">
                                    <h4>Personal Branding</h4>
                                    <!-- <p>Financial Education is more valuable  than money </p> -->
                                    <p>The power of personal
                                        branding is that you're
                                        never playing a role.
                                        Instead, you're delivering
                                        on your brand promise in a
                                        way that's unique to you</p>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Training section end -->
        <!-- platform section start -->
        <div class="wc-platform-wrapper">
            <div class="container">

                <div class="wc-section-title">
                    <h2 class="title">An Easy-to-Use Platform that
                        Connects You to the Right
                        Education</h2>
                </div>
                <div class="wc-platform-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="wc-text-platform">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/book.png" alt="">
                                </div>
                                <div class="plat_testimonial_detail">
                                    <h4>Learn</h4>
                                    <p>Flexible learning
                                        Learn at your own pace,
                                        move between multiple
                                        courses, or switch to a
                                        different course</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="wc-text-platform text-platform2">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/application.png" alt="">
                                </div>
                                <div class="plat_testimonial_detail">
                                    <h4>Apply</h4>
                                    <p>Master yourself in every field
                                        so that more doors will open
                                        to you
                                        for your future</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="wc-text-platform">
                                <div class="main-reviewimage">
                                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/sharing.png" alt="">
                                </div>
                                <div class="plat_testimonial_detail">
                                    <h4>Share </h4>
                                    <p>Its not money that makes
                                        money , Its knowledge that
                                        makes money</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="btn-small btn-course">
                    <a href="{{url('signup')}}">BUY NOW</a>
                </div>
            </div>

        </div>
        <!-- platform section end -->

        <!-- growth section start -->
        <div class="wc-growth-wrapper" style="overflow-x:hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="1000">
                        <div class="wc-growth-headung">
                            <h4>WHY GROWTH ADDICTED ?</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                <div class="wc-main-flex">
                                    <div class="wc-flex-icon">
                                        <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/icon-04.png" alt="img-icon">
                                    </div>
                                    <div class="wc-text-flex">
                                        <p>Grow Quicker with Lower Costs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="wc-main-flex">
                                    <div class="wc-flex-icon">
                                        <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/icon-01.png" alt="img-icon">
                                    </div>
                                    <div class="wc-text-flex">
                                        <p>One Platform for Every Need</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="wc-main-flex">
                                    <div class="wc-flex-icon icon-last">
                                        <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/icon-02.png" alt="img-icon">
                                    </div>
                                    <div class="wc-text-flex">
                                        <p>With Growth Addicted discover exclusive Opportunities to offer value and earn
                                            more.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="wc-main-flex">
                                    <div class="wc-flex-icon icon-last">
                                        <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/icon-004.png" alt="img-icon">
                                    </div>
                                    <div class="wc-text-flex">
                                        <p>
                                            Dedicated Support System</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="wc-best-para">
                                    <p>Best Opportunity To Start Your
                                        Entrepreneurial Journey
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-left"
                        data-aos-duration="1000">
                        <div class="wc-groth-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/Saly-19-0000.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- growth section end -->
        <!-- certificate section end -->
        <div class="wc-certificate-wrapper" style="overflow-x:hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="zoom-in-down"
                        data-aos-duration="1100">
                        <div class="wc-certificate-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/img-4.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="700">
                        <div class="wc-main-cercat-00">
                            <div class="wc-section-title heading0-cc ">
                                <h2 class="title">Certificate</h2>
                            </div>
                            <div class="wc-certificate-text">
                                <p>Expand your knowledge and stay at the top of your competitors with guided
                                    online courses and certificates.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-left"
                        data-aos-duration="700">
                        <div class="wc-main-cercat-00">
                            <div class="wc-section-title heading0-cc headin-certi">
                                <h2 class="title">Perks & Rewards
                                </h2>
                            </div>
                            <div class="wc-certificate-text">
                                <p>Expand your knowledge and stay at the top of your competitors with guided
                                    online courses and certificates.</p>
                            </div>
                            <div class="btn-small btn-cercat-00">
                                <a href="{{url('signup')}}">I WANT TO ENROLL NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 aos-init aos-animate" data-aos="zoom-in-down"
                        data-aos-duration="1100">
                        <div class="wc-certificate-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/img1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- certificate section end -->
        <!-- dream section start -->
        <div class="wc-dream_section" style="overflow-x:hidden; display: none;">
            <div class="container">
                <div class="wc-section-title">
                    <h2 class="title"> IF YOU HAVE A DREAMS ?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="wc_dream_box">
                            <div class="dream_img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/t1.png">
                            </div>
                            <div class="wc_dream_text">
                                <h6>Travel</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="wc_dream_box">
                            <div class="dream_img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/t2.png">
                            </div>
                            <div class="wc_dream_text">
                                <h6>Car</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="wc_dream_box">
                            <div class="dream_img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/t3.png">
                            </div>
                            <div class="wc_dream_text">
                                <h6>House
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wc-dream-bottom-title">
                    <h2 class="title">WE HAVE A OPTION TO FULFILL THEM !</h2>
                </div>
            </div>
        </div>
        <!-- dream section end -->
        <!-- working section start -->
        <div class="wc-working-wrapper d-none">
            <div class="container">
                <div class="wc-section-title">
                    <h2 class="title">Interested in working with us?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-down"
                        data-aos-duration="1200">
                        <div class="wc-working-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/img3.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-down"
                        data-aos-duration="1200">
                        <div class="wc-working-heading-text">
                            <p>Access More Perks & Faster Commissions
                                Here to help you grow your business by offering the best
                                opportunities and support.
                                Best Commission Quick and reliable commissions so you
                                get paid for your hard work
                                TEAM HELPING BONUS – GET PAID BY HELPING YOUR
                                STUDENT
                                Perks & Rewards Earn bonuses And get Surprising
                                rewards and trips to support your growth</p>
                            <div class="btn-small btn-working">
                                <a href="{{url('signup')}}">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- working section end -->
        <!-- founder section start -->
        <div class="wc-founder-section" style="overflow-x:hidden">
            <div class="container">
                <div class="wc-section-title">
                    <h2 class="title">FOUNDER & INSTRUCTOR</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100">
                        <div class="wc-founder-content">
                            <div class="wc-foun-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/dummy-img.png" alt="">
                            </div>
                            <h4>- AMAN UPADHYAY</h4>
                            <p>ENTREPRENEUR | VIDEO SALES EXPERT | TRAINER |
                                CONTENT CREATOR</p>
                            <div class="btn-small btn-founder">
                                <a href="{{url('signup')}}">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- founder section end--->

        <!--- feedback section start --->
        <div class="wc-feedback-wrapper" style="overflow-x:hidden">
            <div class="container">
                <div class="wc-section-title">
                    <h2>OUR STUDENT FEEDBACk</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 aos-init aos-animate" data-aos="fade-down" data-aos-duration="2000">
                        <div class="wc-feedback-slider">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="swiper-feedback">
                                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/001.png">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-feedback">
                                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/002.png">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-feedback">
                                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/003.png">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-feedback">
                                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/004.png">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-feedback">
                                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/005.png">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-feedback">
                                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/s-100.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feedback section end-->
        <!-- footer section start -->


@endsection   