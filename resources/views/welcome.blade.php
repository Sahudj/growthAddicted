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
                                <h3>300</h3>0</div>
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
                                <h3>300</h3>0</div>
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
                <div class="course-card">
                    <div class="left-crs">
                       <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_2.png" alt="content creator">
                    </div>
                    <div class="right-crs">
                        <div class="right-wrapper">
                            <h3>Marketing Mastery</h3>
                            <p>They say that good marketing makes the company look smart and great marketing makes the customer feel smart.This bundle shall teach you how to master this very important skill. In this age of digital content creation digital marketing is what you need to put yourself or your clients on the map.</p>
                           <div class="buy-cont">
                               <h2>3999 /-</h2> 
                               <a class="pri-btn" href="#" style="color:#000">Buy Now</a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section end -->

@endsection