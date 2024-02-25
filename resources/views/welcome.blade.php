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
                        <h3 data-aos="fade-up" data-aos-duration="1000">DIGITAL MASTERY HUB</h3>
                        <div class="fg-title">
                            <h1 data-aos="fade-up" data-aos-duration="1500">Crafting Digital Success</h1>
                            <h4 data-aos="fade-up" data-aos-duration="2000">Achieve online success through dynamic learning branding, and digital marketing.</h4>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="2300">
                            <a class="pri-btn" href="#">Get Started</a>
                        </div>
                    </div>
                    <div class="moving-screen">
                        <div class="temp-scroll" style="--t:25s;">
                            <div class="mar-grp">
                                <div class="momnts-card">1</div>
                                <div class="momnts-card">2</div>
                                <div class="momnts-card">3</div>
                                <div class="momnts-card">4</div>
                                <!-- <div class="momnts-card">5</div> -->
                            </div>
                            <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                                <div class="momnts-card">6</div>
                                <div class="momnts-card">7</div>
                                <div class="momnts-card">8</div>
                                <div class="momnts-card">9</div>
                                <!-- <div class="momnts-card">10</div> -->
                            </div>
                        </div>

                        <div class="temp-scroll" style="--t:25s;">
                            <div class="mar-grp">
                                <div class="momnts-card">1</div>
                                <div class="momnts-card">2</div>
                                <div class="momnts-card">3</div>
                                <div class="momnts-card">4</div>
                                <!-- <div class="momnts-card">5</div> -->
                            </div>
                            <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                                <div class="momnts-card">6</div>
                                <div class="momnts-card">7</div>
                                <div class="momnts-card">8</div>
                                <div class="momnts-card">9</div>
                                <!-- <div class="momnts-card">10</div> -->
                            </div>
                        </div>

                        <div class="temp-scroll" style="--t:25s;">
                            <div class="mar-grp">
                                <div class="momnts-card">1</div>
                                <div class="momnts-card">2</div>
                                <div class="momnts-card">3</div>
                                <div class="momnts-card">4</div>
                                <!-- <div class="momnts-card">5</div> -->
                            </div>
                            <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                                <div class="momnts-card">6</div>
                                <div class="momnts-card">7</div>
                                <div class="momnts-card">8</div>
                                <div class="momnts-card">9</div>
                                <!-- <div class="momnts-card">10</div> -->
                            </div>
                        </div>


                    </div>
                    <div class="ovly-sec">
                        <h1 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">Crafting Success in the Digital Arena<br> Personalized Marketing Mastery</h1>
                        <div class="center-cont">
                            <div class="center-cont-top">
                                <div class="content-box">
                                    <img data-aos="zoom-in-down" data-aos-duration="1000" width="200px" src="{{url('public/frontend/home/')}}/assets/images/content-creator.png" alt="content creator">
                                    <div class="text" data-aos="fade-up" data-aos-duration="1000">Engaging Social Media Content Creation</div>
                                </div>
                                <div class="content-box">
                                    <img data-aos="zoom-in-down" data-aos-duration="1300" width="200px" src="{{url('public/frontend/home/')}}/assets/images/leadership.png" alt="content creator">
                                    <div class="text" data-aos="fade-up" data-aos-duration="1300">Webinars and Virtual Events for Thought Leadership</div>
                                </div>

                                <div class="content-box">
                                    <img data-aos="zoom-in-down" data-aos-duration="1500" width="200px" src="{{url('public/frontend/home/')}}/assets/images/practice.png" alt="content creator">
                                    <div class="text" data-aos="fade-up" data-aos-duration="1500">Inclusive and Accessible Marketing Practices</div>
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
                        <h1>Lets l<span>e</span>arn <br> beyond the limits</h1>
                        <div class="text-desc">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, consequuntur aliquam dolorem totam cupiditate consequatur est impedit repellat deserunt accusamus nesciunt beatae vitae dolorum officia dignissimos cumque sapiente. Voluptate, laborum?
                        </div>
                    </div>
                    <div class="v-section-right ">
                        <div class="video-box">
                            <!-- <video src="https://youtu.be/CTUd15B5rGc?si=0x_d4DBtYnV1U70E" controls></video> -->

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

        <!-- EDUCATION SECTION START HERE  -->
        <div class="education-section">
            <div class="edtn-sec-wrapper">
                <div class="edtn-left">
                    <div class="left-wrapper">
                        <h1>The scaffolding of a successful future is constructed through education.</h1>
                        <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit ea debitis minima, tempore ratione id? Autem iure omnis, quis amet et, laboriosam aut accusamus, deserunt ratione ad ut officia!</h3>
                        <div class="btn-cont">
                            <a href="" class="pri-btn">BOOST YOUR LEARING</a>
                        </div>
                    </div>
                </div>
                <div class="edtn-right">
                    <div class="right-wrapper">
                        <img src="{{url('public/frontend/home/')}}/assets/images/education-girl.png" alt="content creator">
                    </div>
                </div>
            </div>
        </div>
        <!-- EDUCATION SECTION END HERE  -->

        <!-- OUR LEARNING OPPORTUNITY START HERE  -->
        <div class="learning-opty">
            <div class="l-o-wrapper">
                <div class="text-cont">
                    <h4>CLIENTS ACROSS INDUSTRIES</h4>
                    <h1>OUR LEARNING OPPORTUNITY</h1>
                    <h3>From startups to Fortune 500 companies,</h3>
                    <h2>we create custom solutions that grow brands online</h2>
                </div>
                <div class="moving-screen">
                    <div class="temp-scroll" style="--t:25s;">
                        <div class="mar-grp">
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                        </div>
                        <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>0
                            </div>
                        </div>
                    </div>
                    <div class="temp-scroll" style="--t:25s;">
                        <div class="mar-grp">
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                        </div>
                        <div class="mar-grp" aria-hidden="true" style="margin-left:20px;">
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>
                            </div>
                            <div class="momnts-card">
                                <span class="material-symbols-outlined">
                                    stars
                                </span>
                                <h1>Personal development</h1>
                                <h3>300</h3>0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR LEARNING OPPORTUNITY END HERE  -->
        <div class="courses-section">
            <div class="courses-wrapper">
                <h1 data-aos="fade-up" data-aos-duration="1000">Our Courses</h1>
                <h3 data-aos="fade-up" data-aos-duration="1500">Education knows no borders; it is the key to unlocking a world of endless possibilities </h3>
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
                            <!-- <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="content creator">
                         -->
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA_3D_21.png' : (($row->id == 3) ? 'DIDIS3D.png' : ( ($row->id == 4) ? '2-PERSONAL3D2.png' : 'rocketman.png' ) ) }}" alt="blog">

                        </div>
                        <div class="right-crs">

                            <div class="right-wrapper">
                                <h3>{{$row->name}}</h3>
                                @if($row->id == 2)
                                <p>2 course</p>
                                <p>Discover mastery in the Alpha Category with courses like "Affiliate Marketing Brahmastra," "Lead Generation Mastery," "Freelancing Masterclass," "Reselling Mastery," and "MS Word Mastery." Elevate your skills, stay updated, and unlock new opportunities. This curated selection ensures you thrive in affiliate marketing, lead generation, freelancing, reselling, and MS Word proficiency. Your path to success starts here!</p>
                                @elseif($row->id == 3)
                                <p>3COURSES + 2 BONUS COURSES </p>
                                <p>Welcome to the Digital Skills Hub, your destination for mastery in essential digital skills. From conquering sales closure to securing your first sale, mastering Instagram, and excelling in MS Excel, these courses empower you to thrive in the dynamic digital landscape. Elevate your expertise and stay ahead in the world of digital skills with our curated offerings.</p>
                                @elseif($row->id == 4)
                                <p>5 COURSES, 3+2 BONUS COURSES</p>
                                <p>Welcome to the Personal Branding Hub, a premium collection of courses tailored for individuals seeking to elevate their online presence. Master YouTube, Facebook Ads, Mobile Editing, Canva, Reels & Shorts, and Video Marketing. Propel your personal brand to new heights with cutting-edge skills designed to captivate and engage your audience.</p>
                                @else
                                <p>10 COURSES + 11 BONUS COURSES</p>
                                <p>Welcome to the Iconic Category – where excellence meets distinction. Elevate your skills with our extra premium courses, including the Art of Storytelling, Communication Mastery, Content and Copywriting, Email Marketing, English Speaking, LinkedIn Mastery, Public Speaking, Time Management, and Website Development. Unleash your potential in this exclusive collection and transcend ordinary learning.</p>
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
        <!-- WHY GROWTH ADDICTED -->
        <div class="growth-add-section" id="whygrthaddicted">
            <div class="grwt-add-wrapper">
                <h1 class="heading" data-aos="fade-up" data-aos-duration="1000">Why Growth Addicted</h1>
                <div class="grwt-add-cont">
                    <div class="count-cont">
                        <h1><span id="animval1"></span> +</h1>
                        <h2>Tutors</h2>
                    </div>
                    <div class="count-cont">
                        <h1><span id="animval2"></span> +</h1>
                        <h2>Subjects</h2>
                    </div>
                    <div class="count-cont">
                        <h1><span id="animval3"></span> K+</h1>
                        <h2>Students</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- STEPS OF GROWTH -->
        <div class="steps-grwt-section">
            <div class="steps-grwt-wrapper">
                <h1 class="heading">Steps Of growth</h1>
                <div class="steps-cont">
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
                            <h3>Find Course</h3>
                        </div>
                        <div class="stp" data-aos="flip-up" data-aos-duration="1000">
                            <span class="material-symbols-outlined">
                                stars
                            </span>
                            <h3>Book Seat</h3>

                        </div>
                        <div class="stp" data-aos="flip-up" data-aos-duration="1000">
                            <span class="material-symbols-outlined">
                                editor_choice
                            </span>
                            <h3>Certificates</h3>

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
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                <div class="overlay">
                                    <h3>Animesh Mishra</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
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
                <h1>why we are best from others</h1>
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
                <div class="content-cont">
                    <h1>Follow Us For More</h1>
                    <h3>Infotainment Content</h3>
                    <div>
                        <a href="https://instagram.com/growthaddicted.official?igshid=YmMyMTA2M2Y=">@growthaddicted.official</a>
                    </div>
                </div>
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
                                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Animesh Mishra</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque quaerat quibusdam, quis ex eum incidunt expedita natus deleniti facere commodi, ratione saepe ducimus porro nam ea aut corporis tenetur!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Animesh Mishra</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque quaerat quibusdam, quis ex eum incidunt expedita natus deleniti facere commodi, ratione saepe ducimus porro nam ea aut corporis tenetur!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Animesh Mishra</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque quaerat quibusdam, quis ex eum incidunt expedita natus deleniti facere commodi, ratione saepe ducimus porro nam ea aut corporis tenetur!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide testi-card ">
                                    <div class="testi-card-wrap">
                                        <div class="img-box">
                                            <div class="img-box-wrap">
                                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="content creator">
                                                <div class="play-btn">
                                                    <span class="material-symbols-outlined">
                                                        play_circle
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="desc-wrap">
                                                <h1>Animesh Mishra</h1>
                                                <div class="rating">★ ★ ★ ★ ★</div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque quaerat quibusdam, quis ex eum incidunt expedita natus deleniti facere commodi, ratione saepe ducimus porro nam ea aut corporis tenetur!</p>
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
                    <a class="pri-btn" href="https://testimonial.to/resources/16-video-testimonials-examples">Download Now</a>
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