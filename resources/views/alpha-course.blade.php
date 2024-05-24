<style>
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

    .course-details-heading {
        text-transform: uppercase;
        margin-left: 50px;
        margin-top: 70px;
        font-size: 3em;
        font-weight: 600;
        position: relative;
    }

    .course-details-heading::after {
        content: '';
        position: absolute;
        top: 55;
        left: 0;
        width: 60%;
        height: 10px;
        background: linear-gradient(#6978FF, #E16BFF);

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
</style>
@extends('layouts.frontend.index')

@section('content')
<div class="alpha-page" id="alpha-page">
    <div class="alpha-page-wrap">
        <div class="alpha-top"></div>
        <div class="alpha-bottom">
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
                @if($row->id == 2)
                <div class="course-card">
                    <!-- @if($row->package_status == 1)
                    <div class="badge">Best Package</div>
                    @endif -->
                    <div class="left-crs">
                        <!-- <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="content creator">
                         -->
                        <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/{{($row->id == 2) ? 'ALPHA_3D_21.png' : (($row->id == 3) ? 'DIDIS3D.png' : ( ($row->id == 4) ? '2-PERSONAL3D2.png' : 'rocketman.png' ) ) }}" alt="blog">

                    </div>
                    <div class="right-crs">

                        <div class="right-wrapper">
                            <!-- <h3>{{$row->name}}</h3> -->

                            <h3>ALPHA</h3>
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
                            @elseif($row->id == 3)

                            @elseif($row->id == 4)

                            @else

                            @endif


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- course count start here  -->
            <div class="course-count-details">
                <div class="course-count-inner">
                    <div class="count-cont">
                        <div class="count">5</div>
                        <div class="count-head">Course</div>
                    </div>
                    <div class="count-cont">
                        <div class="count">25K+ </div>
                        <div class="count-head">Students</div>
                    </div>
                    <div class="count-cont">
                        <div class="count">100+</div>
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
                            <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="">
                        </div>
                        <div class="card-text-cont-box">
                            <div class="sec-card-heading">
                                AFFILIATE MARKETING BRAHMASTRA
                            </div>
                            <div class="sec-card-description">
                                Welcome to Affiliate Marketing Brahmastra! Here, you'll learn everything about affiliate marketing, from start to finish. Whether you're just starting out or have some experience, this course will give you all the tools and know-how to succeed. Join us and take your online business to the next level!
                            </div>
                        </div>
                    </div>
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
                        </div>
                    </div>
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
                <!-- 3 -->
                <div class="secondry-card">
                    <div class="secondry-card-wrapper">
                        <div class="img-box">
                            <img src="https://ik.imagekit.io/muwui4v4k/courses_details/Lead%20Generation%20Course.png?updatedAt=1711553279428" alt="">
                        </div>
                        <div class="card-text-cont-box">
                            <div class="sec-card-heading">
                                FREELANCING MASTERCLASS
                            </div>
                            <div class="sec-card-description">
                                Explore Freelance Masterclass! Learn freelancing basics, from finding clients to delivering great work. Get the skills you need to succeed in the freelance world. Join us to take charge of your career!
                            </div>
                        </div>
                    </div>
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
                <!-- 4 -->
                <div class="secondry-card">
                    <div class="secondry-card-wrapper">
                        <div class="img-box">
                            <img src="https://ik.imagekit.io/muwui4v4k/courses_details/reels%20&%20shorts%20mastery.png?updatedAt=1711553280898" alt="">
                        </div>
                        <div class="card-text-cont-box">
                            <div class="sec-card-heading">
                                SOCIAL MEDIA MANAGEMENT (SMM) MASTERCLASS
                            </div>
                            <div class="sec-card-description">
                                Welcome to our Social Media Marketing Masterclass (SMM)! Learn all about using social media to grow your business. From creating engaging content to reaching your target audience, this course has everything you need to become a social media expert. Join us and take your online presence to the next level!
                            </div>
                        </div>
                    </div>
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
                        </div>
                    </div>
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

@endsection