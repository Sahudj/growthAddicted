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

    </div>
</div>
<!-- banner section end -->

@endsection