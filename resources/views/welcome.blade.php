@extends('layouts.frontend.index')

@section('content')

<style>
    .btn-small.btn-course {
        max-width: 160px !important;
    }

    .wc-class-img.wc-cls-5d {
        background: #ff2850 !important;
    }
</style>
<!-- banner section start -->
<div class="home-page" id="home-page">
    <div class="home-page-wrap">
        <!-- HEADER SECTION  -->
        <div class="home-header">
            <div class="home-header-inner">
                <div class="home-header-left">
                    <div class="hm-left-wrap">
                        <img class="layer" data-speed="-5" src="{{url('public/frontend/home/')}}/assets/images/section1-img1.png" alt="">
                        <div class="section1-heading " data-speed="2">
                            NAVIGATE THE<br> DIGITAL <br> FRONTIER
                        </div>
                        <div class="section1-btn-cont">
                            <a class="btn-cont-left" href="">GET STARTED <span style="margin-left: 10px;" class="material-symbols-outlined">
                                    east
                                </span></a>
                            <a class="btn-cont-right" href="">
                                <div class="circle">

                                    <span class="material-symbols-outlined">
                                        play_arrow
                                    </span>
                                </div> WATCH VIDEO
                            </a>
                        </div>
                    </div>
                </div>
                <div class="home-header-right">
                    <div class="hm-right-wrap">
                        <img class="img1 layer" data-speed="4" src="{{url('public/frontend/home/')}}/assets/images/section1-img2.png" alt="">
                        <img class="img2" src="{{url('public/frontend/home/')}}/assets/images/section1-img3.png" alt="">
                        <!-- <img class="img3 layer" data-speed="8" src="{{url('public/frontend/home/')}}/assets/images/section1-img4.png" alt=""> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- UPCOMING PROGRAM  -->
        <div class="up-section">

            <h1 class="heading-with-bar">UPCOMING PROGRAMS</h1>
            <div class="section2-cont">
                <div class="up-section-left">
                    <img src="{{url('public/frontend/home/')}}/assets/images/standard-course.png" alt="">
                </div>
                <div class="up-section-right">
                    <h1>Target Mastery</h1>
                    <div class="right-bottom">
                        <div class="img-box">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/dummy-img.png" alt="">
                        </div>
                        <div class="right-bottom-right">
                            <div class="text-contain"><span>IGNITE YOUR INTELLECT:</span> Unleash the Power of Education at Growth Addicted Where Marketing Excellence Begins!</div>
                            <div class="name-contain">BY : AMAN UPADHYAY</div>
                            <a href="" class="explore-contain"> EXPLORE ---- <span class="material-symbols-outlined">
                                    keyboard_arrow_right
                                </span></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- OUR DIGITAL CLUSTERS   -->
        <div class="our-dig-cluster-section">
            <div class="our-dig-inner">
                <div class="div-cont">
                    <h1 class="heading-with-bar-right"> OUR DIGITAL CLUSTERS </h1>
                    <p style="margin-top:30px;font-weight:500; font-size:1.5em">Go beyond the digital realm</p>
                </div>
                <div class="cluster-section-cont">
                    <?php
                    $packageId = '';
                    $orderStatus = '';
                    ?>

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
                    <div class="cluster-section-inner">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section end -->

@endsection