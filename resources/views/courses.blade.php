
@extends('layouts.frontend.index')

@section('content')
<!-- <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/bootstrap.min.css"> -->
<style>


.wc-heading {
    color: #00bcd4;
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 20px;
    font-size: 24px;
}

.wc-course-image {
    width: 300px !important;
    height: auto;
    max-width: 100%; /* Ensure images do not exceed their container width */
    display: block; /* Remove any extra space below images */
    border-radius: 10px;
    margin-bottom: 15px;
    transition: transform 0.3s ease;
}

.wc-course-image:hover {
    transform: scale(1.05);
}

.wc-course-list {
    list-style: none;
    padding: 0;
    margin-bottom: 20px;
}

.wc-course-list li {
    font-size: 16px;
    line-height: 1.4;
}

.price-course {
    font-size: 18px;
    margin: 20px 0;
}

.price-course del {
    color: #f44336;
}

.price-course span {
    color: #4caf50;
    font-weight: bold;
    margin-left: 10px;
}

.btn-buy {
    display: inline-block;
    background-color: #00bcd4;
    padding: 10px 20px;
    border-radius: 5px;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
}

.btn-buy a {
    color: #ffffff;
    text-decoration: none;
}

.btn-buy:hover {
    background-color: #0097a7;
}

.container {
    padding: 20px;
}
.row{
    display: flex;
}
.wc-book-00 img, .wc-book-02 .wc-courses-fl img {
    width: 52%;
}
.wc-courses-flx {
    display: inline-flex;
    /* position: relative; */
    align-items: flex-start;
}
.wc-courses-flx img {
    width: 100%;
}
.wc-book-009{
    display: inline-flex;
}
.wc-book-009 img{
    width: 50%;
}
.wc-books-0092 {
    text-align: center;
}
.wc-book-0093 {
    display: inline-flex;
}
.wc-book-0093 > img {
    width: 24%;
}

@media (max-width: 768px) {
    .wc-heading {
        font-size: 20px;
    }
    .row{
        flex-direction: column;
    }
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
                    <div class="wc-courses-heading aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
                        <h2 class="wc-heading">Alpha</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wc-book-01 aos-init aos-animate row" data-aos="fade-right" data-aos-duration="2000">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/1659474186.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/LEAD.png" alt="" class="wc-course-image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                        <ul class="wc-course-list">
                            <li>Affiliate Marketing Brahmastra</li>
                            <li>Lead Generation Mastery</li>
                            <li>You Get Access To 2 Courses</li>
                            <li>Learnings From Leaders</li>
                            <li>Specialized Training in Various Fields</li>
                            <li>Whatsapp Support</li>
                            <li>Valuable Courses</li>
                        </ul>

                        <?php $packages = DB::table('packages')->get(); ?>
                        <p class="price-course"><del>₹{{$packages[0]->market_price}}</del>-<span>₹{{$packages[0]->amount}}</span></p>
                        <div class="btn-small btn-course btn-buy">
                            <a href="{{ route('login') }}">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wc-courses-wrapper-01">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="wc-courses-heading aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
                        <h2 class="wc-heading">DIGITAL SKILLS HUB</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                    <div class="wc-book-00 row">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/01.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/02.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/03.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-courses-flx">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/04.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/05.png" alt="" class="wc-course-image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                        <ul class="wc-course-list">
                            <li>Instagram Mastery</li>
                            <li>How To Get 1st sale ( Powerful Video Training On 1st Sale )</li>
                            <li>Sales Mastery</li>
                            <li>Bonus You Get ALPHA For Free</li>
                            <li>You Get Access To 5 Courses</li>
                            <li>Learnings From Leaders</li>
                            <li>Specialized Training in Various Fields</li>
                            <li>Whatsapp Support</li>
                            <li>Valuable Courses</li>
                        </ul>
                        <p class="price-course"><del>₹{{$packages[1]->market_price}}</del>-<span>₹{{$packages[1]->amount}}</span></p>
                        <div class="btn-small btn-course btn-buy">
                            <a href="{{ route('login') }}">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wc-courses-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="wc-courses-heading aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
                        <h2 class="wc-heading">PERSONAL BRANDING HUB</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                    <div class="wc-book-009 row">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-1.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-2.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-books-0092 row">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-000.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-book-009 row">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-4.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-5.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-book-0093 row">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-01.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-02.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-03.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-04.png" alt="" class="wc-course-image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                        <ul class="wc-course-list">
                            <li>Youtube Mastery - Automation & Lead Generation</li>
                            <li>Reels & Shorts Mastery</li>
                            <li>Facebook Ads Mastery</li>
                            <li>Canva Mastery</li>
                            <li>Mobile Video Editing Mastery</li>
                            <li>Bonus You Get ALPHA + DIGITAL SKILLS HUB For Free</li>
                            <li>You Get Access To 10 Courses</li>
                            <li>Learnings From Leaders</li>
                            <li>Specialized Training in Various Fields</li>
                            <li>Whatsapp Support</li>
                            <li>Valuable Courses</li>
                        </ul>
                        <p class="price-course"><del>₹{{$packages[2]->market_price}}</del>-<span>₹{{$packages[2]->amount}}</span></p>
                        <div class="btn-small btn-course btn-buy">
                            <a href="{{ route('login') }}">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wc-courses-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="wc-courses-heading aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
                        <h2 class="wc-heading">ICONIC</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                    <div class="wc-book-009">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-1.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-2.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-books-0092">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-000.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-book-009">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-4.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-5.png" alt="" class="wc-course-image">
                    </div>
                    <div class="wc-book-0093 row">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-01.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-02.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-03.png" alt="" class="wc-course-image">
                        <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-04.png" alt="" class="wc-course-image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                        <ul class="wc-course-list">
                            <li>ART OF STORY TELLING</li>
                            <li>COMMUNICATION MASTERY</li>
                            <li>CONTENT WRITING MASTERY</li>
                            <li>COPY WRITING MASTERY</li>
                            <li>EMAIL MARKETING MASTERY</li>
                            <li>ENGLISH SPEAKING MASTERY</li>
                            <li>LINKEDIN MASTERY COURSE</li>
                            <li>PUBLIC SPEAKING MASTERY</li>
                            <li>TIME MANAGEMENT COURSE</li>
                            <li>WEBSITE DEVELOPMENT COURSE</li>
                            <li>YOU GET ACCESS TO 21 COURSES</li>
                            <li>LEARNINGS FROM LEADERS</li>
                            <li>SPECIALIZED TRAINING IN VARIOUS FIELDS</li>
                            <li>WHATSAPP SUPPORT</li>
                            <li>VALUABLE COURSES</li>
                        </ul>
                        <p class="price-course"><del>₹{{$packages[3]->market_price}}</del>-<span>₹{{$packages[3]->amount}}</span></p>
                        <div class="btn-small btn-course btn-buy">
                            <a href="{{ route('login') }}">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection   




   