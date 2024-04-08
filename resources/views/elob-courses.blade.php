<!-- <style>
    .course-count-details {
        margin-top: 20px;
        width: 100%;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .course-count-details .course-count-inner {
        width: 70%;
        height: 100%;
        display: flex;
        justify-content: space-between;

    }

    .course-count-details .course-count-inner .count-cont {
        width: 300px;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .course-count-details .course-count-inner .count-cont .count {
        font-size: 4em;
        color: rgb(0, 89, 255);
        font-weight: 700;

    }

    .course-count-details .course-count-inner .count-cont .count-head {
        font-size: 2em;
        font-weight: 600;

    }



    .course-detail-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    .course-detail-wrapper .secondry-card {
        width: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        overflow: hidden;

    }

    .course-detail-wrapper .secondry-card .secondry-card-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        flex-direction: row;
    }

    .course-detail-wrapper .secondry-card .secondry-card-wrapper .img-box {
        width: 40%;
        height: 360px;
        display: flex;
        justify-content: center;

    }

    .course-detail-wrapper .secondry-card .secondry-card-wrapper .img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;

    }

    .course-detail-wrapper .secondry-card .secondry-card-wrapper .card-text-cont-box {
        width: 60%;
        padding-left: 80px;
        display: flex;
        flex-direction: column;
        gap: 30px;

    }

    .course-detail-wrapper .secondry-card .secondry-card-wrapper .card-text-cont-box .sec-card-heading {
        font-size: 2em;
        font-weight: 600;
    }

    .course-detail-wrapper .secondry-card .secondry-card-wrapper .card-text-cont-box .sec-card-description {
        font-size: 1.2em;
        font-weight: 500;
    }

    .learmore-sec-card {
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 10px 50px;
    }

    .btn-learn-more {
        height: 50px;
        width: 200px;
        background: #01052970;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 22px;
        color: #fff;

    }

    .learn-more-details {
        margin-top: 30px;
        width: 100%;
    }

    .mar-top {
        margin-top: 15px;
    }
</style> -->
@extends('layouts.frontend.index')

@section('content')



<div class="elobcourses-page">
    <div class="elob-wrap">
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
    </div>


    <div class="course-card-wrapper">
        @foreach($allPackages as $row)
        @if($row->id == $id)
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
                    @if($id == 2)
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>05 COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>25+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>COUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Alpha course designed for ambitious individuals hungry for exponential growth. Dive into the world of affiliate marketing, reselling, and freelancing with cutting-edge strategies and hands-on skills. Unleash your potential, master the art of generating passive income streams, and carve your path to success in the digital landscape with Alpha.</p>
                    @elseif($id == 3)
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>04 COURSES + 5 BONUS COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>25+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>COUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Digital Skills Hub is your gateway to mastering the ever-evolving kingdom of digital marketing and Instagram domination. Elevate your online presence, explore and utilise the power of social media and unlock the secrets to creating compelling digital campaigns. Dive into advanced strategies, develop a loyal audience and drive your brand to new heights in the digital age with Digital Skills Hub.</p>
                    @elseif($id == 4)
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>06 COURSES + 9 BONUS COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>25+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>COUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Step into the Personal Branding Hub, where we teach you how to make a big impact online. Learn how to build your personal brand, become a pro at YouTube, master short videos like reels, and become skilled in video marketing and editing. With our easy-to-follow guidance, you'll boost your online presence and reach your goals faster than ever before!</p>
                    @else
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>10 COURSES + 15 BONUS COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>25+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>COUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Dive into the ultimate growth experience with our flagship course, Iconic. Unlock the secrets of online marketing while honing essential soft skills like communication, public speaking, and storytelling. This top-tier package is your comprehensive toolkit for success, equipping you with the expertise to excel in the digital landscape and beyond. Join us on the journey to become an icon in your industry.</p>
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
                                <!-- <a class="sec-btn anim" href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}"><span>BUY NOW</span></a> -->
                                @if($row->id == 2)
                                <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>BUY NOW</span></a>
                                @elseif($row->id == 3)
                                <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>BUY NOW</span></a>
                                @elseif($row->id == 4)
                                <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>BUY NOW</span></a>
                                @else
                                <a class="sec-btn anim" href="{{ url('/elob-courses/' . $row->id) }}"><span>BUY NOW</span></a>
                                @endif
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>


    @if($id == 2)
    <div class="alpha-elob-section">

        <div class="course-count-details" id="alsc">
            <div class="course-count-inner">
                <div class="count-cont">
                    <div class="count"><span id="alsc1"></span></div>
                    <div class="count-head">Course</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="alsc2"></span>K+</div>
                    <div class="count-head">Students</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="alsc3"></span>+</div>
                    <div class="count-head">Tutors</div>
                </div>
            </div>
        </div>
        <!-- course details section start here  -->
        <h1 class="course-details-heading">
            courses of alpha
        </h1>
        <div class="course-detail-wrapper">
            <!-- 1 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/Affiliate%20Marketing%20Brambhastra.png?updatedAt=1711553276110" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            AFFILIATE MARKETING BRAHMASTRA
                        </div>
                        <div class="sec-card-description">
                            Welcome to Affiliate Marketing Brahmastra! Here, you'll learn everything about affiliate marketing, from start to finish. Whether you're just starting out or have some experience, this course will give you all the tools and know-how to succeed. Join us and take your online business to the next level!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1> 3 BENIFITS OF AFFILIATE MARKETING 👇</h1>

                                    <p>1.Passive Income: Earn money while you sleep through affiliate marketing.</p>
                                    <p>2.Developing a positive mindset and understanding psychology for thriving in affiliate marketing.</p>
                                    <p>3.Tools for optimizing affiliate marketing campaigns.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            Get ready to master the art of affiliate marketing tailored for the Indian market! Our course, "Affiliate Marketing Brahmastra," is designed to make learning simple and effective, so you can boost your business growth.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>
                                            1. Understand the Indian Market: Learn about what makes the Indian market tick, so you can tailor your affiliate strategies for success.
                                        </p>
                                        <p>

                                            2. Easy-to-Follow Lessons: From basics to advanced tips, we cover everything you need to know about affiliate marketing in a way that's easy to understand.
                                        </p>
                                        <p>

                                            3. Learn from Experts: Our course is taught by experts who know the ins and outs of affiliate marketing in India, giving you the best advice and strategies.
                                        </p>
                                        <p>

                                            4. Real-Life Examples: See how affiliate marketing works in action with real-life case studies and examples.
                                        </p>

                                        <p>

                                            5. Stay Updated: We'll keep you in the loop with the latest trends and updates in affiliate marketing, so you're always ahead of the game.
                                        </p>
                                        <p class="mar-top">
                                            Join "Affiliate Marketing Brahmastra" and take your business to new heights with the power of affiliate marketing, Indian style! Whether you're new to marketing or a seasoned pro, this course has something for everyone.
                                        </p>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/Lead%20Generation%20Course.png?updatedAt=1711553279428" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            LEAD GENERATION MASTERY
                        </div>
                        <div class="sec-card-description">
                            Join our Lead Generation course and unlock the secrets to effective lead generation strategies. Learn how to attract and convert potential customers into valuable leads. Accelerate your business growth with proven techniques tailored to your industry.
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF LEAD GENERATION 👇</h1>

                                    <p>1.Develop your personal brand to attract and retain leads.</p>
                                    <p>2.Understand how to analyze lead data to make informed decisions.</p>
                                    <p>3.Learn how to automate lead generation processes for scalability.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            At our company, we're obsessed with helping businesses grow and our course, "Lead Generation Mastery," is designed to do just that. Dive into the world of lead generation and learn how to generate both organic and inorganic leads effectively.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>
                                            1. The Complete Lead Generation Toolkit: Whether you're a novice or a seasoned marketer, our course covers all aspects of lead generation, providing you with the tools and strategies you need to succeed.
                                        </p>
                                        <p>

                                            2. Organic Lead Generation Strategies: Discover proven techniques for generating leads organically, Learn how to attract quality leads without breaking the bank.
                                        </p>
                                        <p>

                                            3. Inorganic Lead Generation Tactics: Explore the realm of paid advertising, PPC campaigns, sponsored content, and other inorganic lead generation methods. Master the art of targeting and converting leads through strategic paid initiatives.
                                        </p>
                                        <p>

                                            4. Targeted Audience Insights: Understand your target audience inside out, from their demographics and preferences to their pain points and needs. Learn how to tailor your lead generation efforts to resonate with your ideal customers effectively.
                                        </p>

                                        <p>

                                            5. Conversion Optimization Techniques: It's not just about generating leads; it's about converting them into loyal customers. Discover proven conversion optimization techniques to maximize your lead-to-customer conversion rates and boost your ROI.
                                        </p>
                                        <p class="mar-top">
                                            Empower your business with the knowledge and skills needed to thrive in today's competitive landscape. Unlock a world of opportunities for sustainable growth and success. Whether you're a small startup or a large enterprise, this course is your ultimate guide to mastering the art of lead generation.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/freelancing%20masterclass.png?updatedAt=1712516420018" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            FREELANCING MASTERCLASS
                        </div>
                        <div class="sec-card-description">
                            Explore Freelance Masterclass! Learn freelancing basics, from finding clients to delivering great work. Get the skills you need to succeed in the freelance world. Join us to take charge of your career!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF FREELANCING COURSE 👇</h1>

                                    <p>1.Understand how to build strong relationships with clients for repeat business.</p>
                                    <p>2.Explore different marketing techniques to promote your freelancing services effectively.</p>
                                    <p>3.Learn how to showcase your work effectively to attract potential clients.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            Unlock your potential and step into the world of limitless opportunities with Company Growth Addicted's Freelancing Masterclass! 🚀 Designed for aspiring freelancers and seasoned professionals alike, this comprehensive course is your gateway to success in the dynamic realm of freelancing.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>
                                            1. Expert Guidance: Learn from industry experts who have mastered the art of freelancing, gaining invaluable insights and strategies to excel in the competitive market.
                                        </p>
                                        <p>

                                            2. Practical Skills: Dive deep into practical skills and techniques essential for freelancing success, including client management, project pricing, negotiation tactics, and effective communication strategies.
                                        </p>
                                        <p>

                                            3. Portfolio Development: Craft a standout portfolio that showcases your unique skills and expertise, attracting high-paying clients and lucrative opportunities.
                                        </p>
                                        <p>

                                            4. Marketplace Navigation: Navigate popular freelancing platforms with confidence, understanding how to leverage each platform's features to maximize your earning potential.
                                        </p>

                                        <p>

                                            5. Income Diversification: Discover innovative ways to diversify your income streams, ensuring stability and sustainability in your freelancing career.
                                        </p>
                                        <p>
                                            6. Networking Opportunities: Connect with like-minded freelancers and industry professionals, expanding your network and opening doors to collaboration and growth.
                                        </p>
                                        <p class="mar-top">
                                            Don't miss this chance to unleash your freelancing potential and embark on a journey to financial freedom and fulfillment! Enroll in our Freelancing Masterclass today and take the first step towards building a thriving freelance career.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/smm%20masterclass.png?updatedAt=1712516419947" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            SOCIAL MEDIA MANAGEMENT (SMM) MASTERCLASS
                        </div>
                        <div class="sec-card-description">
                            Welcome to our Social Media Marketing Masterclass (SMM)! Learn all about using social media to grow your business. From creating engaging content to reaching your target audience, this course has everything you need to become a social media expert. Join us and take your online presence to the next level!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF SSM 👇</h1>

                                    <p>1.Learn how to identify and reach your target audience effectively on social media.</p>
                                    <p>2.Master the art of running targeted and cost-effective ad campaigns on social media.</p>
                                    <p>3.Stay updated on the latest social media trends and leverage them for your marketing campaigns.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            Grow Your Business: Learn Social Media Marketing with Our Easy-to-Follow Course

                                            Our company is all about helping businesses and our course, the "Social Media Marketing (SMM) Masterclass," is here to show you how to dominate social media.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>
                                            1. Easy Learning: Whether you're new to social media or know a bit already, our course covers everything you need to know to use social media for your business.
                                        </p>
                                        <p>

                                            2. Platform Tips: Learn how to use Facebook, Instagram, Twitter, LinkedIn, and more to reach the right people. We'll show you the best ways to use each platform to grow your business.
                                        </p>
                                        <p>

                                            3.Make Great Content: Find out how to create posts and videos that people love to share. From catchy pictures to awesome writing, we'll help you make content that gets noticed.
                                        </p>
                                        <p>

                                            4. Connect with Your Fans:* Understand who your customers are and how to talk to them online. We'll share tricks to get people interested in what you're doing and keep them coming back for more.

                                        </p>

                                        <p>

                                            5. Paid Ads Made Simple: Learn how to use ads to reach even more people. We'll teach you how to make ads that get results, whether you want more website visitors or more sales.
                                        </p>

                                        <p class="mar-top">
                                            Ready to take your business to the next level? Sign up for our "SMM Masterclass" and learn how to use social media like a pro. Whether you're a small business or a big one, this course is for you.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 5 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/ms%20word%20mockup.png?updatedAt=1711553279805" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            MS WORD MASTERY
                        </div>
                        <div class="sec-card-description">
                            Discover the power of Microsoft Word with our MS Word course! Learn essential skills like formatting, editing, and document creation. Whether you're a beginner or looking to sharpen your skills, this course has you covered. Join us to become a Word pro!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF MS WORD 👇</h1>

                                    <p>1.Understand how to make your documents accessible to users with disabilities.</p>
                                    <p>2. Discover essential shortcuts and tips to boost your productivity while working in Microsoft Word.</p>
                                    <p>3.Discover how to create and customize tables and charts to organize data effectively.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            Enter our course, "MS Word," where we demystify the world of Microsoft Office and empower you with essential skills for success.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>
                                            1. Comprehensive Office Suite Mastery: Whether you're a beginner or seasoned user, our course covers all the essentials of Microsoft Office, including Word, Excel, PowerPoint, Outlook, and more.
                                        </p>
                                        <p>

                                            2. Hands-On Learning: Dive into practical exercises and simulations, allowing you to gain confidence and proficiency in using Office applications for various tasks and projects.
                                        </p>
                                        <p>

                                            3.Word Processing Wizardry: Unlock the full potential of Microsoft Word as you learn to create professional documents, reports, resumes, and more with ease and efficiency.
                                        </p>
                                        <p>

                                            4. Spreadsheet Sorcery: Master Microsoft Excel and become proficient in creating, formatting, and analyzing data using formulas, functions, charts, and graphs.

                                        </p>

                                        <p>

                                            5. Dynamic Presentations: Elevate your presentations with Microsoft PowerPoint as you learn to design captivating slideshows, animations, and multimedia presentations that leave a lasting impression.
                                        </p>

                                        <p class="mar-top">
                                            Empower yourself with the essential skills needed to excel in the digital workplace and unlock a world of opportunities for personal and professional growth. Whether you're a student, professional, or business owner, this course equips you with the tools and knowledge to succeed in today's technology-driven world.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @elseif($id == 3)
    <div class="digi-skll-elob-sec">
        <div class="course-count-details" id="dses">
            <div class="course-count-inner">
                <div class="count-cont">
                    <div class="count"><span id="dses1"></span></div>
                    <div class="count-head">Course</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="dses2"></span>K+</div>
                    <div class="count-head">Students</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="dses3"></span>+</div>
                    <div class="count-head">Tutors</div>
                </div>
            </div>
        </div>
        <!-- course details section start here  -->
        <h1 class="course-details-heading">
            Courses Of Digital Skills Hub
        </h1>
        <div class="course-detail-wrapper">
            <!-- 1 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/sales%20closing%20mastery.png?updatedAt=1711553282526" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            SALES CLOSING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Join our Sales Closing course to master the art of sales! Learn essential techniques to close deals successfully and grow your business. Whether you're new to sales or want to enhance your skills, this course is for you. Join us and boost your sales performance!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1> 3 BENIFITS OF SALE'S CLOSING 👇</h1>

                                    <p>1. Master a variety of proven closing techniques to seal the deal with potential clients.</p>

                                    <p>2.Develop resilience and strategies for handling rejections in a constructive manner</p>

                                    <p>3.Understand how to build trust and establish rapport with prospects, leading to easier closings.
                                    <p>


                                    <h1 class="mar-top">Key Highlights:</h1>

                                    <div>

                                        <p>1. Easy Sales Tricks: Learn simple ways to close deals and make customers happy. We'll cover everything from handling objections to making people feel good about buying from you.</p>

                                        <p>2. Understand People Better: Find out what makes people buy things and how to use that to your advantage. We'll show you how to build trust, create urgency, and make customers feel confident in their decision.</p>

                                        <p>3. Better Talk Skills: Improve your communication skills so you can explain why your product or service is the best choice. You'll learn how to answer questions and address concerns with ease.</p>

                                        <p>4. Handle Objections Like a Pro: Get confident in dealing with people's worries and turning them into reasons to buy. We'll teach you how to handle common objections with kindness and skill.</p>

                                        <p>5. Closing Tips for Every Situation: Whether you're meeting someone face-to-face or talking on the phone, we've got closing techniques that work. You'll learn what to say to seal the deal in any situation.</p>
                                        <p class="mar-top">
                                            Ready to become a sales superstar? Sign up for our "Sales Closing" course and learn how to close deals like a pro.
                                        </p>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/how%20to%20get%20first%20sale.png?updatedAt=1711553279480" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            HOW TO GET 1ST SALE
                        </div>
                        <div class="sec-card-description">
                            Unlock the secrets to landing your first sale with our 'How to Get 1st Sale' course! Learn essential strategies and tactics to break into the market and secure that crucial first sale. Whether you're launching a new business or struggling to make your first sale, this course will guide you every step of the way. Join us and kickstart your journey to success!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF HOW TO GET FIRST SALE COURSE</h1>

                                    <p>1. Learn Sales from Basis to advance</p>

                                    <p>2. Learn how to effectively use social media platforms to drive affiliate sales</p>

                                    <p>3.Discover techniques for creating compelling content that will attract and engage potential customers</p>

                                    <h1 class="mar-top">HOW TO GET FIRST SALE
                                    </h1>

                                    <div>
                                        <p>
                                            We're all about helping you succeed, which is why we offer courses like "How to Get Your First Sale." It's designed to teach you the basics of making that all-important first sale.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Easy Sales Basics: Learn the simple steps to start selling your product or service. We cover everything from finding potential customers to closing the deal.</p>

                                        <p>2. Know Your Customer: Figure out who your customers are and where to find them. We'll help you understand what they want and how to reach them.</p>

                                        <p>3. Create Irresistible Offers: Make offers that people can't say no to. We'll show you how to make your product or service stand out and get people interested.</p>

                                        <p>4. Keep the Sales Flowing: Learn how to keep in touch with potential customers and turn them into buyers. We'll teach you how to move people along the buying journey.</p>

                                        <p>5. Sell Like a Pro: Get confident in talking to customers and answering their questions. We'll show you how to make them see why they need what you're selling.</p>
                                        <p class="mar-top">
                                            Ready to make your first sale? Sign up for our "How to Get Your First Sale" course and learn how to kickstart your sales journey. Whether you're new to sales or just need a refresher, this course is for you.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/instagram%20mastery%20.png?updatedAt=1711553279571" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            INSTAGRAM MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Instagram Mastery! Learn everything you need to know about mastering Instagram for personal or business growth. From creating engaging content to building a strong presence, this course covers it all. Join us and become an Instagram expert today!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF INSTAGRAM MASTERY COURSE</h1>

                                    <p>1.Discover strategies for growing your followers organically</p>

                                    <p>2.Gain understanding of Instagram's algorithm for better visibility.</p>

                                    <p>3.Uncover secrets to monetizing your Instagram account through sponsored posts and affiliate marketing</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            At our company, we're all about helping you succeed, which is why we offer courses like "Instagram Mastery." It's designed to teach you everything you need to know to shine on the platform.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Easy Instagram Basics: Whether you're new to Instagram or already have an account, our course covers all the essentials to help you become a pro.</p>

                                        <p>2. Create Great Content: Learn how to take awesome photos, write catchy captions, and make engaging videos that grab people's attention and keep them coming back for more.</p>

                                        <p>3. Grow Your Following: Discover simple tricks to attract more followers and boost your engagement. We'll show you how to use hashtags, interact with others, and more to grow your audience.</p>

                                        <p>4. Make Money on Instagram: Find out how to turn your Instagram presence into a source of income. We'll cover sponsored posts, affiliate marketing, and other ways to make money from your account.</p>

                                        <p>5. Master Stories and Reels: Dive into Instagram Stories and Reels and learn how to make fun, eye-catching content that gets noticed. We'll share tips and tricks to help you stand out from the crowd.</p>
                                        <p class="mar-top">
                                            Ready to become an Instagram pro? Sign up for our "Instagram Mastery" course and learn how to take your account to the next level. Whether you're a business owner, influencer or just love sharing photos, this course is for you.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/ms%20excel%20mastery.png?updatedAt=1711553280868" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            MS EXCEL MASTERY
                        </div>
                        <div class="sec-card-description">
                            Discover the power of Microsoft Excel with our MS Excel Mastery course! Learn essential skills like data entry, formulas, and analysis to excel in your work. Whether you're a beginner or looking to enhance your skills, this course is perfect for you. Join us and become an Excel pro!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF MS EXCEL COURSE 👇</h1>

                                    <p>1.Learn to share and collaborate on Excel files with others.</p>

                                    <p>2.Time-saving shortcuts and tricks for increased productivity</p>

                                    <p>3.Data visualization tools to create impactful charts and graphs</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            "Empower Your Skills: Master Microsoft Excel with Our Comprehensive Course"
                                            <br>

                                            At our growth-driven company, we're committed to empowering individuals with practical skills that drive success. Our signature course, "MS Excel Mastery," is designed to equip you with the essential knowledge and proficiency needed to excel in Microsoft Excel.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Excel Training: Whether you're a beginner or an experienced user, our course covers everything you need to know to become proficient in Microsoft Excel, from basic functions to advanced formulas and data analysis techniques.</p>

                                        <p>2. Hands-On Learning: Dive into practical exercises and real-world examples that allow you to apply Excel skills in various scenarios, ensuring you gain confidence and mastery as you progress through the course.</p>

                                        <p>3. Fundamental Functions: Learn how to navigate Excel efficiently, format cells, create spreadsheets, and use essential functions such as SUM, AVERAGE, and VLOOKUP to manipulate and analyze data effectively.</p>

                                        <p>4. Advanced Formulas and Functions: Expand your Excel knowledge with advanced functions and formulas, including IF statements, INDEX-MATCH, PivotTables, and more. Discover how to automate tasks and streamline workflows for increased productivity.</p>

                                        <p>5. Data Analysis Techniques: Unlock the power of Excel for data analysis with features like sorting, filtering, and conditional formatting. Learn how to visualize data using charts and graphs to gain valuable insights and make informed decisions.</p>

                                        <p class="mar-top">
                                            Empower yourself with the skills needed to excel in Microsoft Excel and propel your career forward. Enroll in our "MS Excel Mastery" course and unlock the potential to analyze data, streamline processes, and make impactful decisions with confidence. Whether you're a student, professional or business owner this course is your pathway to Excel proficiency and success.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($id == 4)
    <div class="pers-elob-sec">
        <div class="course-count-details" id="pesc">
            <div class="course-count-inner">
                <div class="count-cont">
                    <div class="count"><span id="pesc1"></span></div>
                    <div class="count-head">Course</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="pesc2"></span>K+</div>
                    <div class="count-head">Students</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="pesc3"></span>+</div>
                    <div class="count-head">Tutors</div>
                </div>
            </div>
        </div>
        <!-- course details section start here  -->
        <h1 class="course-details-heading">
            courses of Personal Branding Hub
        </h1>
        <div class="course-detail-wrapper">
            <!-- 1 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/youtube%20mastery.png?updatedAt=1711553282691" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            YOUTUBE MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to YouTube Mastery! Learn how to grow your channel, create engaging content, and reach your audience effectively. Whether you're a beginner or aiming to boost your channel's success, this course has you covered. Join us and become a YouTube expert!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1> 3 BENIFITS OF YOUTUBE MASTERY COURSE 👇</h1>

                                    <p>1.Gain insight into monetization strategies and how to make money on YouTube</p>

                                    <p>2.Learn how to create engaging and high-quality video content for YouTube.</p>

                                    <p>3.Master techniques to keep your viewers engaged and increase watch time.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            "Unlock Your YouTube Potential: Master YouTube Mastery with Our Comprehensive Course"

                                            Introducing our flagship course "YouTube Mastery," designed to equip you with the essential skills and strategies needed to succeed on the world's largest video platform.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive YouTube Training: Whether you're a beginner or an experienced content creator, our course covers everything you need to know to master YouTube, from channel setup to content optimization and audience engagement.</p>

                                        <p>2. Content Creation Strategies: Learn how to create high-quality, engaging videos that resonate with your audience and drive views and subscribers. We'll cover video planning, filming techniques, editing, and more to help you produce content that stands out.</p>

                                        <p>3. Channel Optimization: Understand the key elements of a successful YouTube channel, including branding, channel layout, and SEO optimization. Learn how to attract more viewers and subscribers and increase your channel's visibility.</p>

                                        <p>4. Audience Growth Tactics: Discover proven strategies to grow your YouTube audience organically, including audience targeting, collaboration opportunities, and promotion techniques. Learn how to expand your reach and attract loyal fans to your channel.</p>

                                        <p>5. Monetization Opportunities: Explore various monetization avenues on YouTube, including ad revenue, sponsorships, merchandise sales, and more. Learn how to leverage your YouTube presence to generate income and turn your passion into a profitable endeavor.</p>

                                        <p class="mar-top">
                                            Empower yourself with the knowledge and skills needed to thrive on YouTube. Enroll in our "YouTube Mastery" course and unlock the potential to grow your channel, reach new audiences, and achieve your goals on the platform. Whether you're a content creator, aspiring influencer, or business owner, this course is your roadmap to YouTube success.
                                        </p>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/facebook%20ads%20mastery.png?updatedAt=1711553279262" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            FACEBOOK ADS
                        </div>
                        <div class="sec-card-description">
                            Unlock the power of Facebook Ads with our course! Learn how to create effective ads, target the right audience, and maximize your ROI on Facebook. Whether you're new to advertising or looking to enhance your skills, this course will help you succeed. Join us and take your Facebook advertising to the next level!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF FB ADS MASTERY COURSE 👇</h1>

                                    <p>1.Learn how to target specific audiences based on demographics, interests, and behaviors.</p>

                                    <p>2.Retargeting users who have interacted with your brand in the past.</p>

                                    <p>3.Generating leads and driving traffic to your website.</p>
                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            Our signature course "Facebook Ads Mastery," is designed to equip you with the essential knowledge and proficiency needed to excel in leveraging Facebook's powerful advertising platform.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Facebook Ads Training: Whether you're new to advertising or an experienced marketer, our course covers everything you need to know to create and manage effective Facebook ad campaigns from start to finish.
                                        <p>

                                        <p>2. Understanding the Facebook Ads Ecosystem: Gain insight into the structure and functionality of Facebook Ads Manager, including campaign objectives, audience targeting options, ad formats, and bidding strategies.</p>

                                        <p>3. Strategic Ad Campaign Planning: Learn how to develop strategic ad campaigns tailored to your business goals, target audience, and budget. Understand the importance of campaign structure, ad creative, and messaging for maximizing results.</p>

                                        <p>4. Audience Targeting and Segmentation: Discover advanced audience targeting techniques to reach the right people with your ads. Learn how to create custom and lookalike audiences, use demographic and interest targeting, and retarget website visitors for higher conversion rates.</p>

                                        <p>5. Ad Creative and Copywriting Mastery: Master the art of creating compelling ad creatives and persuasive ad copy that captivate your audience and drive action. Explore best practices for designing attention-grabbing visuals and crafting engaging ad messaging.</p>
                                        <p class="mar-top">
                                            Empower yourself with the skills needed to succeed in Facebook advertising. Enroll in our "Facebook Ads Mastery" course and unlock the potential to reach new audiences, drive sales, and grow your business through targeted and effective advertising on the world's largest social media platform. Whether you're a small business owner, marketer, or entrepreneur, this course is your pathway to Facebook advertising success.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/art%20of%20video%20editing.png?updatedAt=1711553276244" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            ART OF VIDEO EDITING
                        </div>
                        <div class="sec-card-description">
                            The art of video editing combines technical skill with creative storytelling, manipulating footage to convey emotion, information, and atmosphere. Editors craft seamless transitions, enhance visual effects, and synchronize audio to create a compelling narrative. Through precise cuts and timing, they shape raw footage into a polished, captivating final product.
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS ART OF VIDEO EDITING COURSE 👇</h1>

                                    <p>1. Understand color grading techniques for a polished and professional look.</p>

                                    <p>2. The psychology of professional Video editing</p>

                                    <p>3.Gain expertise in video editing software to bring your creative vision to life </p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            "Unleash Your Creativity: Master the Art of Video Editing with Our Comprehensive Course"

                                            Introducing our flagship course, "Art of Video Editing," designed to equip you with the essential knowledge and proficiency needed to excel in the world of video editing.
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Video Editing Training: Whether you're a beginner or an experienced editor, our course covers everything you need to know to master the art of video editing, from basic techniques to advanced editing workflows.</p>

                                        <p>2. Understanding Editing Software: Gain proficiency in popular video editing software such as Adobe Premiere Pro, Final Cut Pro, or DaVinci Resolve. Learn the interface, tools, and features to edit videos like a pro.</p>

                                        <p>3. Editing Fundamentals: Learn the fundamental principles of video editing, including cutting, trimming, and arranging clips, adding transitions, and syncing audio. Master the basics to create seamless and professional-looking videos.</p>

                                        <p>4. Creative Effects and Transitions: Explore advanced editing techniques to enhance your videos with creative effects, transitions, and animations. Discover how to add visual flair and storytelling elements to captivate your audience.</p>

                                        <p>5. Color Correction and Grading: Understand the art of color correction and grading to give your videos a polished and professional look. Learn how to adjust color, contrast, and exposure to achieve the desired mood and aesthetic.</p>
                                        <p class="mar-top">
                                            Empower yourself with the skills needed to succeed in video editing. Enroll in our "Art of Video Editing" course and unlock the potential to bring your creative vision to life through compelling and impactful videos. Whether you're a filmmaker, content creator, or aspiring editor, this course is your pathway to video editing mastery.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/canva%20editing%20mastery.png?updatedAt=1711553276230" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            CANVA MASTERY
                        </div>
                        <div class="sec-card-description">
                            Unlock the creative power of Canva with our Editing Mastery course! Learn how to design stunning graphics, presentations, and more with ease. Whether you're a beginner or looking to enhance your skills, this course will help you master Canva like a pro. Join us and elevate your design game!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS CANVA EDITING MASTERY COURSE 👇</h1>

                                    <p>1.Understanding design theory and principles</p>

                                    <p>2.Improving your problem-solving skills</p>

                                    <p>3.Master the use of Canva's extensive template library for various design projects</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our flagship courses is 'Canva Mastery,' designed to equip learners with comprehensive knowledge and skills in utilizing Canva the renowned graphic design platform. Below are some key highlights of what this course offers:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Canva Training: Whether you're a novice or seasoned user, our course covers everything from the basics to advanced techniques in Canva.</p>

                                        <p>2. Hands-on Learning: Engage in practical exercises and projects that reinforce your understanding and application of Canva's features and tools.</p>

                                        <p>3. Design Fundamentals: Learn essential principles of design, such as color theory, typography, and layout, to create visually appealing graphics.</p>

                                        <p>4. Creative Design Projects: Explore various design projects, including social media graphics, posters, presentations, and more, to unleash your creativity and build a diverse portfolio.</p>

                                        <p>5. Advanced Techniques: Dive into advanced features of Canva, such as layers, effects, and custom templates, to elevate your designs and stand out from the crowd.</p>

                                        <p class="mar-top">
                                            Enroll in our 'Canva Mastery' course today and unlock your potential to create stunning and impactful designs effortlessly. Whether you're a marketer, entrepreneur, educator or creative enthusiast, this course is tailored to enhance your Canva skills and empower you to achieve your design goals."
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 5 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/reels%20&%20shorts%20mastery.png?updatedAt=1711553280898" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            REELS AND SHORT MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Reels and Shorts Mastery! Learn how to create captivating short-form videos for social media platforms like Instagram and YouTube shorts. From content creation to editing techniques, this course covers everything you need to know to make your videos stand out. Whether you're a beginner or looking to level up your skills, join us and master the art of reels and shorts!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF REELS AND SHORTS 👇</h1>

                                    <p>1.Develop your editing skills and learn how to create compelling, visually engaging content.</p>

                                    <p>2.Learn the art of storytelling through short films and understand the importance of brevity in communication.</p>

                                    <p>3.Explore collaborations with other creators to expand your reach and audience.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our course 'Reels and Short Mastery,' where we provide comprehensive learning on mastering the art of creating captivating short-form videos for platforms like Instagram Reels. Here are some key highlights of what this course entails:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Short-Form Video Training: Whether you're a beginner or experienced creator, our course covers everything you need to know to excel in creating engaging short-form videos.</p>

                                        <p>2. Understanding Reels and Shorts Platforms: Gain insights into the unique features and algorithms of platforms like Instagram Reels and TikTok, and learn how to leverage them to maximize reach and engagement.</p>

                                        <p>3. Creative Video Production Techniques: Explore various techniques for planning, shooting, and editing short-form videos to capture attention and tell compelling stories in a short timeframe.</p>

                                        <p>4. Content Strategy and Audience Engagement: Learn how to develop an effective content strategy tailored to your target audience and niche, and discover techniques for increasing audience engagement and retention.</p>

                                        <p>5. Optimizing Video Performance: Understand the factors that contribute to video performance on Reels and Shorts platforms, including hashtags, captions, and timing, and learn how to optimize your videos for maximum visibility.</p>

                                        <p class="mar-top">
                                            Enroll in our 'Reels and Short Mastery' course today and unlock your potential to create impactful and memorable short-form videos that resonate with your audience. Whether you're a content creator, influencer, marketer, or business owner, this course is designed to help you succeed in the fast-paced world of short-form video content."
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 6 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="https://ik.imagekit.io/muwui4v4k/courses_details/video%20marketing%20mastery.png?updatedAt=1711553282449" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            VIDEO MARKETING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Video Marketing Mastery! Learn how to leverage the power of video to grow your business. From creating engaging content to optimizing your strategy, this course covers all aspects of video marketing. Whether you're a beginner or looking to enhance your skills, join us and become a video marketing expert!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF VIDEO MARKETING MASTERY 👇</h1>

                                    <p>1.Discover how video content can lead to higher conversion rates and sales</p>

                                    <p>2.Learn how to create informative and educational videos to establish authority in your industry.</p>

                                    <p>3.Learn how video marketing can be used to promote Product and services.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our top courses is called 'Video Marketing Mastery.' This course is all about teaching you how to do video marketing really well. Here's what you'll learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Learn Everything About Video Marketing: Whether you're just starting out or you've done some marketing before, this course covers everything you need to know about using videos to promote your business.</p>

                                        <p>2. Understand Different Video Platforms: We'll show you how to use different places like YouTube, Facebook, Instagram and YouTube short to share your videos with the right people.</p>

                                        <p>3. Make a Plan for Your Videos: Learn how to make a plan for your videos that matches what you want to achieve with your business and who you want to reach.</p>

                                        <p>4. Make Great Videos: We'll teach you how to make videos that people will love to watch, from writing the script to editing the final version.</p>

                                        <p>5. Get More People to Watch Your Videos: Find out how to get more people to watch your videos by making them easy to find and interesting to watch.</p>

                                        <p class="mar-top">
                                            Sign up for our 'Video Marketing Mastery' course now and start using the power of video to grow your business. Whether you're new to marketing or you've been doing it for a while, this course will help you get better at using videos to promote your business.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="iconic-elob-sec">
        <h1>Iconic</h1>
    </div>
    @endif
</div>


















@endsection