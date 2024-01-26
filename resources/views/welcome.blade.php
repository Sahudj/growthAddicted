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
            <div class="home-header-left">
                <div class="hm-left-wrap">
                    <h1>Your Growth,<br>Our Passion</h1>
                    <h3>Start Where You're, We'll Take You Where You Want To Go !</h3>
                    <div>
                        <button class="secondary-btn" style="width: 60%; height:100px;margin-top:50px;">
                            <span>GET STARTED</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="home-header-right">
                <div class="hm-right-wrap">
                    <div class="scroll" style="--t:20s;">
                        <div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img1.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img2.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img3.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img4.png" alt="">
                            </div>
                        </div>
                        <div style="margin-top:20px">
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img1.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img2.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img3.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img4.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="scroll" style="--t:20s; ">
                        <div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img5.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img6.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img7.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img8.png" alt="">
                            </div>
                        </div>
                        <div style="margin-top:20px">
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img5.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img6.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img7.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/')}}/assets/images/img8.png" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- VIDEO SECTION  -->
        <div class="video-section">
            <div class="video-section-wraper">
                <h1>A PLATFORM THAT SUPPORTS<br>YOU END-TO-END</h1>
                <div class="video-cont">
                    <video src="#" controls poster="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png">

                    </video>
                </div>
            </div>
        </div>
        <!-- COURSE SECTION -->
        <div class="course-section">

            <div class="course-section-wraper">
                <div class="title">
                    <h1>Our Courses</h1>
                    <h3>
                        WE ARE ON A MISSION TO EDUCATE THE WORLD
                    </h3>
                </div>
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
                $tempArr = !empty($packages->packageId) ? explode(',', $packages->packageId) : [];
                ?>
                @endauth()
                <div class="course-card-cont">
                    <div class="card-grid">

                        @foreach($allPackages as $row)
                        <div class="course-card">
                            <div class="course-card-wrap">
                                @if($row->id == 2)
                                <h1>BASIC</h1>
                                @elseif($row->id == 3)
                                <h1>STANDARD</h1>
                                @elseif($row->id == 4)
                                <h1>PRO</h1>
                                @else
                                <h1>PREMIUM</h1>
                                @endif


                                <div class="course-title">{{$row->name}}</div>
                                <div class="course-desc">
                                    <span class="material-symbols-outlined">
                                        check_small
                                    </span>
                                    @if($row->id == 2)
                                    <p>2 course</p>
                                    @elseif($row->id == 3)
                                    <p>3COURSES + 2 BONUS COURSES </p>
                                    @elseif($row->id == 4)
                                    <p>5 COURSES, 3+2 BONUS COURSES</p>
                                    @else
                                    <p>10 COURSES + 11 BONUS COURSES</p>
                                    @endif
                                </div>
                                <div class="price-det">
                                    @if(!empty($tempArr) && $orderStatus == 1 && in_array($row->id,$tempArr))
                                    <?php
                                    $getNewPrice = DB::table('package_comm')->where(['from_package' => $packageId, 'to_package_id' => $row->id])->first();
                                    ?>
                                    @if(auth()->user()->role != 1)<p class="price"><del>₹{{$row->market_price}}</del>  <span>- ₹{{$getNewPrice->amount}}</span></p>
                                    @endif
                                    <div class=" btn-course">

                                        <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                                            <a href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();">Upgrade Now</a>
                                        </form>
                                    </div>

                                    @elseif(auth()->user() && $orderStatus == 0)
                                    <p class="price"><del>₹{{$row->market_price}}</del> <span>- ₹{{$row->amount}}</span></p>
                                    <div class=" btn-course">
                                        <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                                            <a href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();">BUY NOW</a>
                                        </form>
                                    </div>
                                    @elseif($packageId != $row->id && $packageId < $row->id)
                                        <p class="price"><del>₹{{$row->market_price}}</del> <span>- ₹{{$row->amount}}</span></p>
                                        <div class=" btn-course">
                                            <a href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}">BUY NOW</a>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="gradient">
            </div>
        </div>
        <div class="dummy">
            lorem*200
        </div>

    </div>
</div>
<!-- banner section end -->

@endsection