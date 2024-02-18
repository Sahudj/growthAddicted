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
            <div class="home-header-top">
                <div class="top-hd-bg">
                    <div class="top-hd-fg">
                        <h3>DIGITAL MASTERY HUB</h3>
                        <div class="fg-title">
                            <h1>Crafting Digital Success</h1>
                            <h4>Achieve online success through dynamic learning branding, and digital marketing.</h4>
                        </div>
                        <div>
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
                        <h1>Crafting Success in the Digital Arena<br> Personalized Marketing Mastery</h1>
                        <div class="center-cont">
                            <div class="center-cont-top">
                                <div class="content-box">
                                    <img width="200px" src="{{url('public/frontend/home/')}}/assets/images/content-creator.png" alt="content creator">
                                    <div class="text">Engaging Social Media Content Creation</div>
                                </div>
                                <div class="content-box">
                                    <img width="200px" src="{{url('public/frontend/home/')}}/assets/images/leadership.png" alt="content creator">
                                    <div class="text">Webinars and Virtual Events for Thought Leadership</div>
                                </div>

                                <div class="content-box">
                                    <img width="200px" src="{{url('public/frontend/home/')}}/assets/images/practice.png" alt="content creator">
                                    <div class="text">Inclusive and Accessible Marketing Practices</div>
                                </div>

                            </div>

                            <div class="center-video-cont">
                                <div class="play-btn">
                                    <span class="material-symbols-outlined">
                                        play_arrow
                                    </span>
                                </div>
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
                    <div class="v-section-right open">
                        <div class="video-box">
                            <video src="" controls></video>
                        </div>
                        <span class="material-symbols-outlined">
                            play_circle
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
                <h1>Our Courses</h1>
                <h3>Education knows no borders; it is the key to unlocking a world of endless possibilities </h3>
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
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA_3D_21.png' : (($row->id == 3) ? 'DIDIS3D.png' : ( ($row->id == 4) ? '2-PERSONAL3D2.png' : 'course4-3D-img.png' ) ) }}" alt="blog">

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
        <div class="growth-add-section">
            <div class="grwt-add-wrapper">
                <h1 class="heading">Why Growth Addicted</h1>
                <div class="grwt-add-cont">
                    <div class="count-cont">
                        <h1>1K +</h1>
                        <h2>Tutors</h2>
                    </div>
                    <div class="count-cont">
                        <h1>3K +</h1>
                        <h2>Subjects</h2>
                    </div>
                    <div class="count-cont">
                        <h1>15K +</h1>
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
                        <div class="stp">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                            <h3>Find Course</h3>
                        </div>
                        <div class="stp">
                            <span class="material-symbols-outlined">
                                stars
                            </span>
                            <h3>Book Seat</h3>

                        </div>
                        <div class="stp">
                            <span class="material-symbols-outlined">
                                editor_choice
                            </span>
                            <h3>Certificates</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section end -->

@endsection