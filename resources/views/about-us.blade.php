@extends('layouts.frontend.index')

@section('content')
<style>
    /* General Reset and Styling */


    .wc-main-courses h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0 0 15px 0;
        font-weight: 700;
    }

    .wc-main-courses p {
        margin: 0 0 15px 0;
        line-height: 1.6;
    }

    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Banner Section */
    .wc-banner-wrapper {
        background: #f0f0f0;
        text-align: center;
        padding: 100px 0;
    }

    .wc-banner-wrapper h1 {
        font-size: 2.5em;
        color: #007bff;
        margin-bottom: 10px;
    }

    .wc-banner-wrapper p {
        font-size: 1.2em;
        color: #555;
    }

    /* Main Courses Section */
    .wc-main-courses {
        padding: 60px 0;
    }

    .wc-courses-heading {
        text-align: center;
        margin-bottom: 40px;
    }

    .wc-courses-heading h4 {
        font-size: 2em;
        color: #007bff;
    }

    .wc-courses-heading p {
        font-size: 1.1em;
        color: #555;
    }

    /* Platform Section */
    .wc-platform-wrapper {
        background: #f9f9f9;
        padding: 60px 0;
    }

    .wc-section-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .wc-section-title h2 {
        font-size: 2.5em;
        color: #007bff;
    }

    .wc-platform-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .wc-text-platform {
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
        padding: 20px;
        margin: 10px;
        flex: 1;
        min-width: 280px;
        max-width: 300px;
        height: 100%;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .wc-text-platform:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .wc-text-platform img {
        max-width: 100px;
        margin-bottom: 15px;
    }

    .wc-text-platform h4 {
        font-size: 1.5em;
        color: #007bff;
    }

    .wc-text-platform p {
        font-size: 1em;
        color: #555;
    }

    /* Founder Section */
    .wc-founder-section {
        padding: 60px 0;
    }

    .wc-founder-content {
        text-align: center;
    }

    .wc-foun-img img {
        max-width: 200px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .wc-founder-content h4 {
        font-size: 1.5em;
        color: #007bff;
    }

    .wc-founder-content p {
        font-size: 1.1em;
        color: #555;
    }

    .card-container {
        display: flex;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .wc-banner-wrapper {
            padding: 60px 0;
        }

        .wc-banner-wrapper h1 {
            font-size: 2em;
        }

        .wc-banner-wrapper p {
            font-size: 1em;
        }

        .wc-platform-box {
            flex-direction: column;
            align-items: center;
        }

        .wc-text-platform {
            margin: 10px 0;
        }

        .wc-founder-content {
            padding: 0 20px;
        }

        .card-container {
            flex-direction: column;
        }
    }

    /* Animation Library (AOS) */
    [data-aos] {
        opacity: 0;
        transition-property: transform, opacity;
    }

    [data-aos][data-aos][data-aos-duration="2000"] {
        transition-duration: 2000ms;
    }

    [data-aos="zoom-in"] {
        transform: scale(0.8);
    }

    [data-aos="zoom-in"].aos-animate {
        transform: scale(1);
        opacity: 1;
    }

    [data-aos="fade-up"] {
        transform: translate3d(0, 50px, 0);
    }

    [data-aos="fade-up"].aos-animate {
        transform: translate3d(0, 0, 0);
        opacity: 1;
    }
</style>
<div class="wc-banner-wrapper" style="overflow-x:hidden; padding: 175px 0px 18px !important;">
    <!-- <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="2000">
                        <div class="wc-banner-text">
                            <h1>start where you're, we'll take you where you want to go !</h1>
                            <p>"YOUR GROWTH. OUR PASSION"</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-left"
                        data-aos-duration="2000">
                        <div class="wc-banner-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/banner-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div> -->
</div>
<div class="wc-main-courses" style="overflow-x:hidden">
    <div class="wc-courses-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="wc-courses-heading" data-aos="zoom-in" data-aos-duration="2000">
                        <h4>About us</h4>
                        <p>GROWTH ADDICTED is an ed-tech platform.
                            We help our students to achieve their goals with our
                            updated and trendiest courses.</p>
                        <p>Additionally, Growth Addicted offers them the chance to join as affiliates and make money by promoting the
                            courses that are offered there.</p>
                        <p>We prepare our candidates to enter the real world and
                            compete in different fields.</p>
                        <h4>Learning at Every Step</h4>
                        <p>Growth Addicted Mission Is To Help Learners Of All Ages Reach Their Full Potential Through Inspired Teaching And Personalized Learning. We Do This By Providing Clear Pathways For Learners To Expand Their Skills, Explore Their Options, And Change Their Lives.</p>
                        <p>Growth Addicted is more than a platform, it is your trusted partner to help you do what you do best: help as many PEOPLE as possible TO fulfill their dreams & get best career options. Access to top learning on your finger tip.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wc-platform-wrapper">
        <div class="container">
            <div class="wc-section-title">
                <h2 class="title">An Easy-to-Use Platform that Connects You to the Right Education</h2>
            </div>
            <div class="wc-platform-box">
                <div class="row card-container">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="wc-text-platform">
                            <div class="main-reviewimage">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/book.png" alt="">
                            </div>
                            <div class="plat_testimonial_detail">
                                <h4>Learn</h4>
                                <p>Flexible learning. Learn at your own pace, move between multiple courses, or switch to a different course.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="wc-text-platform text-platform2">
                            <div class="main-reviewimage">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/application.png" alt="">
                            </div>
                            <div class="plat_testimonial_detail">
                                <h4>Apply</h4>
                                <p>Master yourself in every field so that more doors will open to you for your future.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="wc-text-platform">
                            <div class="main-reviewimage">
                                <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/sharing.png" alt="">
                            </div>
                            <div class="plat_testimonial_detail">
                                <h4>Share</h4>
                                <p>It's not money that makes money, it's knowledge that makes money.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wc-founder-section" style="overflow-x:hidden">
        <div class="container">
            <div class="wc-section-title">
                <h2 class="title">FOUNDER & INSTRUCTOR</h2>
            </div>
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1100">
                    <div class="wc-founder-content">
                        <div class="wc-foun-img">
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/dummy-img.png" alt="">
                        </div>
                        <h4>- AMAN UPADHYAY</h4>
                        <p>ENTREPRENEUR | VIDEO SALES EXPERT | TRAINER | CONTENT CREATOR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection