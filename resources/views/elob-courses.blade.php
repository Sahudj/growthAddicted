@extends('layouts.frontend.index')

@section('content')



<div class="elobcourses-page">
    <div class="elob-wrap">
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
    </div>
    {{$id}}


    @if($id == 2)
    <div class="alpha-elob-section">
        <div class="course-card-wrapper">
            <div class="course-card">
                <div class="left-crs">
                    <!-- <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="content creator">
                         -->
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="blog">

                </div>
                <div class="right-crs">

                    <div class="right-wrapper">


                        <h3>ALPHA</h3>
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
                            </span>Alpha course designed for ambitious individuals hungry for exponential growth. Dive into the world of affiliate marketing, reselling, and freelancing with cutting-edge strategies and hands-on skills. Unleash your potential, master the art of generating passive income streams, and carve your path to success in the digital landscape with Alpha.</p>
                        <div class="buy-cont">
                            <!-- <h2>3999 /-</h2>
                                    <a class="pri-btn" href="#" style="color:#000">Buy Now</a> -->

                            @if(!empty($tempArr) && $orderStatus == 1 && in_array($id,$tempArr))
                            <?php
                            $getNewPrice = DB::table('package_comm')->where(['from_package' => $packageId, 'to_package_id' => $id])->first();
                            ?>
                            @if(auth()->user()->role != 1)<p class="price"><del>₹{{$allPackages[0]->market_price}}</del> - <span>₹{{$getNewPrice->amount}}</span></p>
                            @endif
                            <div class="btn-cont1">

                                <form method="POST" name="banner-form" id="packages{{$id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $id)}}">
                                    <a class="sec-btn anim" href="javascript:void(0);" onclick="document.getElementById('packages{{$id}}').submit();">Upgrade Now</a>
                                </form>
                            </div>

                            @elseif(auth()->user() && $orderStatus == 0)
                            <p class="price"><del>₹{{$allPackages[0]->market_price}}</del> - <span>₹{{$allPackages[0]->amount}}</span></p>
                            <div class="btn-cont1">
                                <form method="POST" name="banner-form" id="packages{{$id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $id)}}">
                                    <a class="sec-btn anim" href="javascript:void(0);" onclick="document.getElementById('packages{{$id}}').submit();"><span>BUY NOW</span></a>
                                </form>
                            </div>
                            @elseif($packageId != $id && $packageId < $id) <p class="price"><del>₹{{$allPackages[0]->market_price}}</del> - <span>₹{{$allPackages[0]->amount}}</span></p>
                                <div class="btn-cont1">
                                    <a class="sec-btn anim" href="{{ url('signup?guest='.encryptor('encrypt', $id)) }}"><span>BUY NOW</span></a>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($id == 3)
    <div class="digi-skll-elob-sec">
        <h1>Digital skills Hub</h1>
    </div>
    @elseif($id == 4)
    <div class="pers-elob-sec">
        <h1>Peronal branding</h1>
    </div>
    @else
    <div class="iconic-elob-sec">
        <h1>Iconic</h1>
    </div>
    @endif
</div>


















@endsection