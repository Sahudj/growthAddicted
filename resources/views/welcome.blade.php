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
    <!-- modal start here  -->
    <div class="modal">
        <button id="modalClose" class="modalClose"><span class="material-symbols-outlined">
                close
            </span></button>
        <div id="video-modal" style="width: 100%; height:100%;">

        </div>
    </div>
    <!-- modal end here  -->

    <div class="home-page-wrap">
        <!-- HEADER SECTION  -->
        <div class="home-header">
            <div class="home-header-top">
                <div class="top-hd-bg">
                    <div class="top-hd-fg">

                        <div class="txtrvlanimwrap">


                            <div class="positivity">
                                <div class="positivity__words">
                                    <span class="change">SHURUWAT</span>
                                    <span class="change">शुरुवात</span>
                                    <span class="change">SHURUWAT</span>
                                    <span class="change">शुरुवात</span>
                                </div>
                                <span class="positivity__alone">&nbsp;Yahi Se Hai</span>
                            </div>

                        </div>

                        <div class="fg-title">
                            <h1 data-aos="fade-up" data-aos-duration="1500">Let's Learn Beyond The Limits</h1>
                            <h4 data-aos="fade-up" data-aos-duration="2000">Making Education affordable and accessible across</h4>
                            <h3 data-aos="fade-up" data-aos-duration="2050" class="india-color">INDIA</h3>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="2300">
                            <a class="pri-btn" href="{{ url('signup') }}">Get Started</a>
                        </div>
                    </div>
                    <div class="moving-screen">
                        <div class="temp-scroll" style="--t:25s;">
                            <div class="mar-grp">
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1411-min (1).JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1391-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1038-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1028-min.JPG" alt="">
                                </div>

                            </div>
                            <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0988-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0939-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0879-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0873-min.JPG" alt="">
                                </div>

                            </div>
                        </div>

                        <div class="temp-scroll" style="--t:25s;">
                            <div class="mar-grp">
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0782-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0716-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE0704-min-1.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-26at6.04.31PM-min (1).jpeg" alt="">
                                </div>

                            </div>
                            <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-26at6.03.43PM-min.jpeg" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-25at10.32.14PM-min.jpeg" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-25at10.31.44PM-min.jpeg" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-25at10.28.53PM-min.jpeg" alt="">
                                </div>

                            </div>
                        </div>

                        <div class="temp-scroll" style="--t:25s;">
                            <div class="mar-grp">
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE9570-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE9564-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1480-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1460-min.JPG" alt="">
                                </div>

                            </div>
                            <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1451-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/_ONE1449-min.JPG" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-26at6.05.25PM-min.jpeg" alt="">
                                </div>
                                <div class="momnts-card">
                                    <img loading="lazy" src="{{url('public/frontend/home/')}}/assets/images/headerSection/WhatsAppImage2024-02-26at6.04.59PM-min.jpeg" alt="">
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="ovly-sec">
                        <h1 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">Building Tomorrow's Leaders <br>Through Digital Education</h1>
                        <div class="center-cont">
                            <div class="center-cont-top">
                                <div class="content-box">
                                    <img data-aos="zoom-in-down" data-aos-duration="1000" src="{{url('public/frontend/home/')}}/assets/images/flexonlinecouses.jpg" alt="content creator">
                                    <div class="text" data-aos="fade-up" data-aos-duration="1000">Flexible Online Courses</div>
                                </div>
                                <div class="content-box">
                                    <img data-aos="zoom-in-down" data-aos-duration="1300" src="{{url('public/frontend/home/')}}/assets/images/livevirtual.jpg" alt="content creator">
                                    <div class="text" data-aos="fade-up" data-aos-duration="1300">Live Virtual Workshop</div>
                                </div>

                                <div class="content-box">
                                    <img data-aos="zoom-in-down" data-aos-duration="1500" src="{{url('public/frontend/home/')}}/assets/images/247.jpg" alt="content creator">
                                    <div class="text" data-aos="fade-up" data-aos-duration="1500">24/7 Access to Resources</div>
                                </div>

                            </div>

                            <div class="center-video-cont" data-aos="fade-up" data-aos-duration="2300">
                                <a class="play-btn" id="playBtnmodal" href="https://www.youtube.com/embed/7GkGArj-ugk?si=cgmWLK7QyBWj5Trn">
                                    <span class="material-symbols-outlined">
                                        play_arrow
                                    </span>
                                </a>
                                <div class="play-text">
                                    See Our Work
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="home-header-bottom"></div>
        </div>
        <!-- HEADER SECTION  -->
        <!-- VIDEO SECTION START HERE  -->
        <div class="video-section">
            <div class="video-section-wrapper">
                <div class="v-thumb">
                    <div class="v-section-left">
                        <h1>START WHERE YOU <span>ARE</span> <br></h1>
                        <h2>
                            WE'LL TAKE YOU WHERE YOU WANT TO GO !
                        </h2>
                    </div>
                    <div class="v-section-right ">
                        <div class="video-box">
                        </div>
                        <span class="material-symbols-outlined" id="v-play-btn">
                            play_circle
                        </span>
                        <span style="display:none;" class="material-symbols-outlined" id="v-close-btn">
                            cancel
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- VIDEO SECTION END HERE  -->


        <!-- EDUCATION SECTION END HERE  -->

        <!-- OUR LEARNING OPPORTUNITY START HERE  -->
        <div class="learning-opty">
            <div class="l-o-wrapper">
                <div class="text-cont">

                    <h1>OUR LEARNING OPPORTUNITY</h1>
                    <h3>Find the best course to grow your skills</h3>

                </div>
                <div class="moving-screen">
                    <div class="temp-scroll" style="--t:25s;">
                        <div class="mar-grp">
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/Affiliate-Marketing.png" alt="">
                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/Digimark.png" alt="">
                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/stockmark.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/contentwrit.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/webdev.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/lnkdmaster.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/artofstory.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/Social.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/freelancing.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/mobvidedit.png" alt="">
                            </div>
                        </div>
                        <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/Affiliate-Marketing.png" alt="">
                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/Digimark.png" alt="">
                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/stockmark.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/contentwrit.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/webdev.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/lnkdmaster.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/artofstory.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/Social.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/freelancing.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/mobvidedit.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="temp-scroll" style="--t:25s;">
                        <div class="mar-grp">
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/profvidediting.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/graphicdesg.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/facebookads.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/instamark.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/canvaediting.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/emailmarketing.png" alt="">
                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/pubspek.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/ytguide.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/medyog.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/artofsales.png" alt="">

                            </div>
                        </div>
                        <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/profvidediting.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/graphicdesg.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/facebookads.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/instamark.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/canvaediting.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/emailmarketing.png" alt="">
                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/pubspek.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/ytguide.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/medyog.png" alt="">

                            </div>
                            <div class="momnts-card">
                                <img src="{{url('public/frontend/home/')}}/assets/images/coursesBg/artofsales.png" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR LEARNING OPPORTUNITY END HERE  -->
        <div class="courses-section">
            <div class="courses-wrapper">
                <h1 data-aos="fade-up" data-aos-duration="1000">OUR EDUCATIONAL BUNDLES</h1>
                <h3 data-aos="fade-up" data-aos-duration="1500">EXPLORE A VARIETY OF COURSES AIMED AT MASTERING THE SECRETS TO SUCCEEDING IN THIS SOCIAL MEDIA ERA</h3>
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
                        @if($row->package_status == 1)
                        <div class="badge">Best Package</div>
                        @endif
                        <div class="left-crs">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA_3D_21.png' : (($row->id == 3) ? 'DIDIS3D.png' : ( ($row->id == 4) ? '2-PERSONAL3D2.png' : 'rocketman.png' ) ) }}" alt="blog">
                        </div>
                        <div class="right-crs">

                            <div class="right-wrapper">
                                <h3>{{$row->name}}</h3>
                                @if($row->id == 2)
                                <div class="course-card-heading">
                                    <div class="sneeks">
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                book_2
                                            </span>05 COURSES</p>
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                schedule
                                            </span>8+ HOURS</p>
                                    </div>

                                </div>
                                <div class="features-list-info">
                                    <p class="about-course">Alpha course designed for ambitious individuals hungry for exponential growth. Dive into the world of affiliate marketing, reselling, and freelancing with cutting-edge strategies and hands-on skills. Unleash your potential, master the art of generating passive income streams, and carve your path to success in the digital landscape with Alpha.</p>
                                </div>
                                <div class="features-list">
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CERTIFICATES </p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>LIVE Q&A</p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CUSTOMER SUPPORT</p>
                                </div>

                                @elseif($row->id == 3)
                                <div class="course-card-heading">
                                    <div class="sneeks">
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                book_2
                                            </span>04 COURSES + 5 BONUS COURSES</p>
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                schedule
                                            </span>15+ HOURS</p>
                                    </div>
                                </div>
                                <div class="features-list-info">
                                    <p class="about-course">Digital Skills Hub is your gateway to mastering the ever-evolving kingdom of digital marketing and Instagram domination. Elevate your online presence, explore and utilise the power of social media and unlock the secrets to creating compelling digital campaigns. Dive into advanced strategies, develop a loyal audience and drive your brand to new heights in the digital age with Digital Skills Hub.</p>
                                </div>
                                <div class="features-list">
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CERTIFICATES </p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>LIVE Q&A</p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CUSTOMER SUPPORT</p>
                                </div>

                                @elseif($row->id == 4)
                                <div class="course-card-heading">
                                    <div class="sneeks">
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                book_2
                                            </span>06 COURSES + 9 BONUS COURSES</p>
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                schedule
                                            </span>36+ HOURS</p>
                                    </div>
                                </div>
                                <div class="features-list-info">
                                    <p class="about-course">Step into the Personal Branding Hub, where we teach you how to make a big impact online. Learn how to build your personal brand, become a pro at YouTube, master short videos like reels, and become skilled in video marketing and editing. With our easy-to-follow guidance, you'll boost your online presence and reach your goals faster than ever before!</p>
                                </div>
                                <div class="features-list">
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CERTIFICATES </p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>LIVE Q&A</p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CUSTOMER SUPPORT</p>
                                </div>

                                @else
                                <div class="course-card-heading">
                                    <div class="sneeks">
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                book_2
                                            </span>10 COURSES + 15 BONUS COURSES</p>
                                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                                schedule
                                            </span>80+ HOURS</p>
                                    </div>
                                </div>
                                <div class="features-list-info">
                                    <p class="about-course">Dive into the ultimate growth experience with our flagship course, Iconic. Unlock the secrets of online marketing while honing essential soft skills like communication, public speaking, and storytelling. This top-tier package is your comprehensive toolkit for success, equipping you with the expertise to excel in the digital landscape and beyond. Join us on the journey to become an icon in your industry.</p>
                                </div>
                                <div class="features-list">
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CERTIFICATES </p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>LIVE Q&A</p>
                                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                            check
                                        </span>CUSTOMER SUPPORT</p>
                                </div>

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
                                            <a class="sec-btn anim" href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();"><span>Enroll Now</span></a>
                                        </form>
                                    </div>
                                    @elseif($packageId != $row->id && $packageId < $row->id)
                                        <p class="price"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>
                                        <div class="btn-cont1">
                                            <!-- <a class="sec-btn anim" href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}"><span>BUY NOW</span></a> -->
                                            @if($row->id == 2)
                                            <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>Enroll Now</span></a>
                                            @elseif($row->id == 3)
                                            <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>Enroll Now</span></a>
                                            @elseif($row->id == 4)
                                            <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>Enroll Now</span></a>
                                            @else
                                            <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>Enroll Now</span></a>
                                            @endif
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
        <!-- WHY GROWTH ADDICTED -->
        <div class="growth-add-section" id="whygrthaddicted">
            <div class="grwt-add-wrapper">
                <h1 class="heading" data-aos="fade-up" data-aos-duration="1000">Why Growth Addicted</h1>
                <div class="grwt-add-cont">
                    <div class="count-cont">
                        <h1><span id="animval1"></span>+</h1>
                        <h2>Tutors</h2>
                    </div>
                    <div class="count-cont">
                        <h1><span id="animval2"></span>+</h1>
                        <h2>Trainings</h2>
                    </div>
                    <div class="count-cont">
                        <h1><span id="animval3"></span>K+</h1>
                        <h2>Students</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- STEPS OF GROWTH -->
        <div class="steps-grwt-section">
            <div class="steps-grwt-wrapper">
                <h1 data-aos="fade-up" data-aos-duration="1000" class="heading">Steps Of growth</h1>
                <div data-aos="fade-up" data-aos-duration="1200" class="steps-cont">
                    <div class="step-bar">
                        <div class="sbar"></div>
                        <div class="sbar"></div>
                        <div class="sbar"></div>
                    </div>
                    <div class="steps">
                        <div class="stp" data-aos="flip-up" data-aos-duration="1000">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                            <h3>Explore</h3>
                        </div>
                        <div class="stp" data-aos="flip-up" data-aos-duration="1000">
                            <span class="material-symbols-outlined">
                                menu_book
                            </span>
                            <h3>learn</h3>

                        </div>
                        <div class="stp" data-aos="flip-up" data-aos-duration="1000">
                            <span class="material-symbols-outlined">
                                trending_up
                            </span>
                            <h3>Grow</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instructors section  -->
        <div class="instructors-section">
            <div class="instructor-wrapper">
                <div class="heading">
                    <h1>Creative Instructors</h1>
                    <h2>
                        Make Us Skillful
                    </h2>
                </div>

                <div class="crousal-wrapper">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/amanshukla.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Aman Shukla</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/sagardeshmukh.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Sagar Deshmukh</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/monicalimbu.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Monica Limbu</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/gautamjain.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Gautam Jain</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/shashishkumartiwari.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Shashish Kumar Tiwari</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/VrindaGupta.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Vrinda Gupta</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/vinaysahu.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Vinay Sahu</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/mehasharma.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Meha Sharma</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/instructor/divyabhauwala.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Divya Bhauwala</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <span class="material-symbols-outlined">
                                expand_circle_right
                            </span>
                        </div>
                        <div class="swiper-button-prev">
                            <span class="material-symbols-outlined">
                                expand_circle_right
                            </span>
                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- plants section  -->
        <div class="plant-section">
            <div class="plant-section-wrapper">
                <div class="left-cont">
                    <img src="{{url('public/frontend/home/')}}/assets/images/plant1.gif" alt="content creator">

                </div>
                <div class="right-cont">
                    <div class="anim-cont">
                        <p>An insatiable desire for </p>
                        <section class="dytxt">
                            <div class="first">
                                <div>Growth</div>
                            </div>
                            <div class="second">
                                <div>Inspiration</div>
                            </div>
                            <div class="third">
                                <div>Challenges</div>
                            </div>
                        </section>
                        <p> propels the addiction to cultivate flourishing plants. </p>
                    </div>
                    <div class="btn-cont">
                        <a class="third-btn" href="https://www.instagram.com/plantwithgrowthaddicted?igsh=eWRkMHc1Z3czdXFo&utm_source=qr">Learn more</a>
                    </div>
                    <img src="{{url('public/frontend/home/')}}/assets/images/plant2.gif" alt="content creator">

                </div>
            </div>
        </div>
        <!-- why we are best from other section  -->
        <div class="best-f-other-section">
            <div class="other-sec-wrapper">
                <!-- <img src="{{url('public/frontend/home/')}}/assets/images/we_best.png" alt="content creator"> -->
                <h1 data-aos="fade-up" data-aos-duration="500">why we are best from others</h1>
                <div class="card-cont">
                    <div class="special-card" data-aos="zoom-out-up" data-aos-duration="1000">
                        <div class="front">
                            <div class="card-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/weBest1.png" alt="content creator">
                            </div>
                            <h3>Grow Quicker with Affordable Learning</h3>
                        </div>
                        <div class="back">
                            <h3>You are an inch away to be the best</h3>
                            <a>Start Now</a>
                        </div>
                    </div>
                    <div class="special-card" data-aos="zoom-out-up" data-aos-duration="1500">
                        <div class="front">
                            <div class="card-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/weBest5.png" alt="content creator">
                            </div>
                            <h3>One Platform for Every Need</h3>
                        </div>
                        <div class="back">
                            <h3>You are an inch away to be the best</h3>
                            <a>Start Now</a>
                        </div>
                    </div>
                    <div class="special-card" data-aos="zoom-out-up" data-aos-duration="2000">
                        <div class="front">
                            <div class="card-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/weBest2.png" alt="content creator">
                            </div>
                            <h3>With Growth Addicted Discover Exclusive Opportunities to Offer Value and Earn More</h3>
                        </div>
                        <div class="back">
                            <h3>You are an inch away to be the best</h3>
                            <a>Start Now</a>
                        </div>
                    </div>
                    <div class="special-card" data-aos="zoom-out-up" data-aos-duration="2500">
                        <div class="front">
                            <div class="card-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/weBest3.png" alt="content creator">
                            </div>
                            <h3>Dedicated Support System</h3>
                        </div>
                        <div class="back">
                            <h3>You are an inch away to be the best</h3>
                            <a>Start Now</a>
                        </div>
                    </div>
                    <div class="special-card" data-aos="zoom-out-up" data-aos-duration="3000">
                        <div class="front">
                            <div class="card-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/weBest4.png" alt="content creator">
                            </div>
                            <h3>24/7 Accessibility</h3>
                        </div>
                        <div class="back">
                            <h3>You are an inch away to be the best</h3>
                            <a>Start Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- instragram section  -->
        <div class="instgram-section">
            <div class="insta-wrapper">
                <a href="https://instagram.com/growthaddicted.official?igshid=YmMyMTA2M2Y="></a>
            </div>
        </div>
        <!-- student feedback section  -->
        <div class="testimonialt-section">
            <div class="testimonial-wrapper">
                <h1 class="heading">Journeys to Excellence</h1>
                <div class="testimonial-cont">
                    <div class="left-wrap">
                        <div class="swiper testimonial-crousal">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/AdnanQureshi.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Adnan Qureshi</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>With a high vision for success, I've always sought opportunities to achieve financial freedom. However, it wasn't until I found this program that my dreams started to materialize. It has provided me with the tools and guidance to turn my aspirations into reality. I'm deeply thankful for the transformative experience and the newfound skills. Thank you, Growth Addicted, for being the catalyst for my success!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/AliHaider.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Ali Haider</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Growth Addicted has been a turning point for me. I've always had the desire to make money, but I never seemed to find the right opportunity. This program has opened doors I never knew existed, allowing me to finally achieve my goal. I'm incredibly grateful for the opportunity and the skills I've gained. Thank you, Growth Addicted, for changing my life!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/SubhamPodh.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Shubham Podh</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Growth Addicted has been a game-changer for me! While working a job, I always dreamt of achieving something bigger but lacked direction. This program transformed my life, providing me with the skills and guidance I needed. Now, I'm earning a lot and couldn't be happier. Thank you, Growth Addicted, for changing my life!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/RohitKumar.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Rohit Kumar</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Growth Addicted has changed my life! Even while studying in college, I started making money and fulfilling my dream of helping others. I'm incredibly thankful to Growth Addicted for empowering me to achieve my goals.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/SnehaSapra.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Sneha Sapra</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Growing up, I was always the quiet, introverted girl. But after joining Growth Addicted, everything changed. The training program helped me become confident in my communication skills. I learned how to effectively convey my ideas and connect with others. Not only did I become great at communication, but I also started making a lot of money, making my parents proud. I'm so grateful to Growth Addicted for helping me grow personally and professionally. I'm proud to be part of such an amazing company!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/Sumitpant.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Sumit Pant</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Ever since I was young, I dreamed of being a content creator. However, life always seemed to get in the way. But now, with this training program, I can finally focus on turning that dream into reality. The program has given me the tools and knowledge to create content that resonates with others. I'm so grateful for this opportunity, and I can't wait to see where this journey takes me!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/AnkitGole.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Ankit Gole</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Being in college and wanting to support my family was a big responsibility. This training program helped me turn my passion into a source of income. I learned how to create compelling videos that resonated with viewers. With the skills I gained, I started earning money while still in college. It feels incredible to support my family and pursue my dreams at the same time. Growth Addicted has truly been a life-changing experience for me!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/AbhishekVerma.jpeg" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Abhishek Verma</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>After struggling in the corporate sector and feeling like a failure for so long, I decided to take a different path. I became a teacher but still felt unfulfilled. Then, I found this training program, and everything changed. I learned how to create engaging content and monetize it effectively. Now, I'm not only a successful creator but also a successful money maker. I've never been happier in my life. This training program has truly transformed my career and my outlook on life!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/MadhuriChheda.jpeg" alt="content creator">
                                                <div class="play-btn" id="madhu">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Madhuri Chheda</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>After becoming a mom of two, I always wanted to find a way to earn extra income without sacrificing time with my kids. This platform was a game-changer for me! The content was easy to follow, even with a busy schedule. I started creating videos in my spare time and started earning money! It feels amazing to contribute financially to my family while doing something I love. This Training Program has truly changed my life!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/student/SanchitaYelgate.jpeg" alt="content creator">
                                                <div class="play-btn" id="sanchi">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Sanchita Yelgate</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Working with Growth Addicted was a game-changer for me! I felt so empowered and equipped with the skills I needed to succeed in content creation. Not only did I improve my content quality, but I also saw a significant increase in my earnings. Within just a month, I was able to start earning money from my videos. The course content was so easy to understand and apply, making it a truly valuable investment in my career!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>
                    </div>
                    <!-- <div class="right-wrap">

                    </div> -->
                </div>
            </div>
        </div>
        <!-- book section  -->
        <div class="book-section">
            <div class="imgLoader"></div>
            <div class="book-sec-wrapper">
                <div class="text-cont">
                    <h1>Maximize Online Impact</h1>
                    <h3> Grab Your 2024 Branding Guide</h3>
                </div>
                <div class="book">
                    <div class="gap"></div>
                    <div class="pages">
                        <div class="page"></div>
                        <div class="page"></div>
                        <div class="page"></div>
                        <div class="page"></div>
                        <div class="page"></div>
                        <div class="page"></div>
                    </div>
                    <div class="flips">
                        <div class="flip flip1">
                            <div class="flip flip2">
                                <div class="flip flip3">
                                    <div class="flip flip4">
                                        <div class="flip flip5">
                                            <div class="flip flip6">
                                                <div class="flip flip7"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="download-btn">
                    <a class="pri-btn" href="https://ik.imagekit.io/muwui4v4k/book_growth_addicted.pdf?updatedAt=1709222800754" download target="_blank">Download Now</a>
                </div>
            </div>
        </div>
        <!-- book section  -->

        <div class="faq-section">
            <div class="faq-sec-wrapper">
                <div class="faq-text-cont">
                    <h1>Feed Your Curiosity </h1>
                    <h3>Answers to Your Burning Questions</h3>
                </div>
                <div class="main-cont">
                    <details>
                        <summary>WHAT IS GROWTH ADDICTED?</summary>
                        <p>We provide a variety of online courses on career, soft skills, and business development on our ed-tech platform, Growth Addicted. By bridging the gap between education and entrepreneurship, what began as a plan to create jobs during the epidemic has evolved into a revolution in the gig economy.</p>
                    </details>
                    <details>
                        <summary>IS THERE ANY TIME LIMIT OF COURSES?</summary>
                        <p>No, there is no time limit of courses. you can access it anytime and anywhere you want.</p>
                    </details>
                    <details>
                        <summary>Will i get certificate after course?</summary>
                        <p>Yes, after finishing the courses, you get an organizational certification. Not only that, but our courses also bear the MSME certification, which further increases their legitimacy. You will obtain a certificate at the end of these courses, which attests to your accomplishment.</p>
                    </details>
                    <details>
                        <summary>What opportunity you provide?</summary>
                        <p>Growth Addicted provides its students with countless options, including mentoring them in all areas of their careers and helping them advance their level of expertise. Additionally, it improves your social media presence, which helps in platform monetization.</p>
                    </details>
                    <details>
                        <summary>What kind of skill based courses do you provide?</summary>
                        <p>Website Development, Instagram , Digital Marketing, Affiliate Marketing Mastery, Facebook Ads , Stock Market , and many more skill-based courses are available at Growth Addicted. Additionally, Growth Addicted offers top-notch training sessions under the "In-demand" sector.</p>
                    </details>
                    <details>
                        <summary>Is my payment information secure?</summary>
                        <p>Yes, we do take your payment information security very seriously. To guarantee the security of your payment information, we employ secure payment gateways and industry-standard encryption.</p>
                    </details>
                    <details>
                        <summary>Can i contact support if i have questions or issues?</summary>
                        <p>Of course! Our committed support team is available to help. You can use the contact details on our website to get in touch with our support team if you need help, have any queries, or are experiencing technical issues.</p>
                    </details>
                    <details>
                        <summary>How do these courses help me to start my freelancing journey?</summary>
                        <p>You can launch your freelance career after finishing a course and becoming an expert in a particular field. You may set up your freelancing profile on numerous websites, such as Fiverr, Freelancer, Upwork, and many more, and start taking on different assignments. In fact, this might assist you in earning a respectable sum of money.</p>
                    </details>
                    <details>
                        <summary>Is it one time fee or monthly fee?</summary>
                        <p>very package you purchase just requires a one-time payment, and you will have lifelong access to the course.</p>
                    </details>
                    <details>
                        <summary>Is growth addicted government verified?</summary>
                        <p>Yes, we are Udhyam registered.</p>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section end -->

@endsection