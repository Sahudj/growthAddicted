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
                        <img class="img3 layer" data-speed="8" src="{{url('public/frontend/home/')}}/assets/images/section1-img4.png" alt="">

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- banner section end -->

@endsection