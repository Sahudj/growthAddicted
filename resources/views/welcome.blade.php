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
<div class="home-page">
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
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                        </div>
                        <div style="margin-top:20px">
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="scroll" style="--t:20s; ">
                        <div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                        </div>
                        <div style="margin-top:20px">
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
                            </div>
                            <div class="card1">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png" alt="">
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
                    <video   src="#" controls  poster="{{url('public/frontend/home/')}}/assets/images/3d-img/boy-00.png">

                    </video>
                </div>
            </div>
        </div>
        <div class="course-section">
           
            <div class="course-section-wraper">
                <div class="title">
                    <h1>Our Courses</h1>
                    <h3>
                    WE ARE ON A MISSION TO EDUCATE THE WORLD
                    </h3>
                </div>
                <div class="course-card-cont">
                    <div class="card-grid">
                        <div class="course-card"></div>
                        <div class="course-card"></div>
                        <div class="course-card"></div>
                        <div class="course-card"></div>
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