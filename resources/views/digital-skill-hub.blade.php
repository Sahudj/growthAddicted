@extends('layouts.frontend.index')

@section('content')
<div class="alpha-page" id="alpha-page">
    <div class="alpha-page-wrap">
        <div class="alpha-top"></div>
        <div class="alpha-bottom">
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
            <div class="course-card-wrapper">
                @foreach($allPackages as $row)
                <div class="course-card">
                    <!-- @if($row->package_status == 1)
                    <div class="badge">Best Package</div>
                    @endif -->
                    <div class="left-crs">
                        <!-- <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="content creator">
                         -->
                        <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA_3D_21.png' : (($row->id == 3) ? 'DIDIS3D.png' : ( ($row->id == 4) ? '2-PERSONAL3D2.png' : 'rocketman.png' ) ) }}" alt="blog">

                    </div>
                    <div class="right-crs">

                        <div class="right-wrapper">
                            <h3>{{$row->name}}</h3>
                            @if($row->id == 2)
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        book_2
                                    </span>05 COURSES</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        schedule
                                    </span>25+ HOURS</p>
                            </div>
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>LIVE Q&A</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>COUSTOMER SUPPORT</p>
                            </div>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>CERTIFICATES </p>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>Learn how to become a freelance social media manager with our training course! Discover essential skills like content creation, audience engagement, and analytics tracking. Get ready to kickstart your freelance career and help businesses thrive online!</p>
                            @elseif($row->id == 3)
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        book_2
                                    </span>04 COURSES + 5 BONUS COURSES</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        schedule
                                    </span>25+ HOURS</p>
                            </div>
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>LIVE Q&A</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>COUSTOMER SUPPORT</p>
                            </div>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>CERTIFICATES </p>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>Join our digital skills hub bundle to learn how to succeed in the online world! We'll teach you everything from using social media effectively to marketing online. Get ready to boost your career and stay ahead in today's digital age!</p>
                            @elseif($row->id == 4)
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        book_2
                                    </span>06 COURSES + 9 BONUS COURSES</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        schedule
                                    </span>25+ HOURS</p>
                            </div>
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>LIVE Q&A</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>COUSTOMER SUPPORT</p>
                            </div>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>CERTIFICATES </p>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>Discover the power of personal branding! Our course will guide you through creating a unique online presence that reflects your strengths and values. Learn how to effectively showcase your skills, build credibility, and stand out in your industry. Elevate your personal brand and unlock new opportunities!</p>
                            @else
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        book_2
                                    </span>10 COURSES + 15 BONUS COURSES</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        schedule
                                    </span>25+ HOURS</p>
                            </div>
                            <div style="display:flex; gap:30px; ">
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>LIVE Q&A</p>
                                <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                        check
                                    </span>COUSTOMER SUPPORT</p>
                            </div>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>CERTIFICATES </p>
                            <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                    check
                                </span>Explore our diverse range of skillful courses! From mastering social media to honing digital marketing techniques, we offer something for everyone. Elevate your skills and unlock new opportunities with our iconic courses!</p>
                            @endif

                            <div class="buy-cont">
                                <!-- <h2>3999 /-</h2>
                                    <a class="pri-btn" href="#" style="color:#000">Buy Now</a> -->

                                @if(!empty($tempArr) && $orderStatus == 1 && in_array($row->id,$tempArr))
                                <?php
                                $getNewPrice = DB::table('package_comm')->where(['from_package' => $packageId, 'to_package_id' => $row->id])->first();
                                ?>
                                @if(auth()->user()->role != 1)<p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$getNewPrice->amount}}</span></p>
                                @endif
                                <div class="btn-cont1">

                                    <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                                        <a class="sec-btn anim" href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();">Upgrade Now</a>
                                    </form>
                                </div>

                                @elseif(auth()->user() && $orderStatus == 0)
                                <p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>
                                <div class="btn-cont1">
                                    <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                                        <a class="sec-btn anim" href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();"><span>BUY NOW</span></a>
                                    </form>
                                </div>
                                @elseif($packageId != $row->id && $packageId < $row->id)
                                    <p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>
                                    <div class="btn-cont1">
                                        <a class="sec-btn anim" href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}"><span>BUY NOW</span></a>
                                    </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection