
@extends('layouts.frontend.index')

@section('content')

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
                            <h2>Alpha</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="wc-book-01 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/1659474186.png" alt="" width="" height="">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/LEAD.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                            <ul>
                                <li>Affiliate Marketing Brahmastra</li>
                                <li>Lead Generation Mastery</li>
                                <li>You Get Access To 2 Courses</li>
                                <li>Learnings From Leaders</li>
                                <li>Specialized Training in Various
                                    Fields</li>
                                <li>Whatsapp Support</li>
                                <li>Valuable Courses</li>
                            </ul>

                            <?php
                                $packages = DB::table('packages')->get();
                            ?>
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
                            <h2>DIGITAL SKILLS HUB</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                        <div class="wc-book-00 " >
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/01.png" alt="" width="" height="">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/02.png" alt="">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/03.png" alt="">
                           
                        </div>
                        <div class="wc-courses-flx">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/04.png" alt="">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/05.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                            <ul>
                                <li>Instagram Mastery</li>
                                <li>How To Get 1st sale ( Powerful Video
                                    Training On 1st Sale )</li>
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
                            <h2>PERSONAL BRANDING HUB</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                        <div class="wc-book-009 " >
                             <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-1.png" alt="" width="" height="">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-2.png" alt="">
                        </div>
                        <div class="wc-books-0092">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-000.png" alt="">
                        </div>
                        <div class="wc-book-009">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-4.png" alt="" width="" height="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-5.png" alt="">
                       </div>
                       <div class="wc-book-0093">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-01.png" alt="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-02.png" alt="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-03.png" alt="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-04.png" alt="">
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                            <ul>
                                <li>Youtube Mastery - Automation & Lead
                                    Generation</li>
                                <li>Reels & Shorts Mastery</li>
                                <li>Facebook Ads Mastery</li>
                                <li>Canva Mastery</li>
                                <li>Mobile Video Editing Mastery
                                </li>
                                <li>Bonus You Get ALPHA + DIGITAL SKILLS HUB For
                                    Free</li>
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
                            <h2>ICONIC</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                        <div class="wc-book-009 " >
                             <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-1.png" alt="" width="" height="">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-2.png" alt="">
                        </div>
                        <div class="wc-books-0092">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-000.png" alt="">
                        </div>
                        <div class="wc-book-009">
                            <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-4.png" alt="" width="" height="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-5.png" alt="">
                       </div>
                       <div class="wc-book-0093">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-01.png" alt="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-02.png" alt="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-03.png" alt="">
                           <img src="{{url('public/frontend/home/')}}/assets/images/courses/img-04.png" alt="">
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="wc-book-text aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                            <ul>
                               <li>ART OF STORY TELLING </li>
                                <li>COMMUNICATION MASTERY </li>
                                <li>CONTENT WRITING MASTERY </li>
                                <li>COPY WRITING MASTERY </li>
                                <li>EMAIL MARKETING MASTERY </li>
                                <li>ENGLISH SPEAKING MASTERY </li>
                                <li>LINKEDIN MASTERY COURSE </li>
                                <li>PUBLIC SPEAKING MASTERY </li>
                                <li>TIME MANAGEMENT COURSE </li>
                                <li>WEBSITE DEVELOPMENT COURSE </li>
                                <li>YOU GET ACCESS TO 21 COURSES </li>
                                <li>LEARNINGS FROM LEADERS </li>
                                <li>SPECIALIZED TRAINING IN VARIOUS FIELDS</li> 
                                <li>WHATSAPP SUPPORT </li>
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




   