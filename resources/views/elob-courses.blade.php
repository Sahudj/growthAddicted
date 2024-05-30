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
                    @if($id == 2)
                    <h3>{{$row->name}}</h3>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>05 COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>8+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>CUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Alpha course designed for ambitious individuals hungry for exponential growth. Dive into the world of affiliate marketing, reselling, and freelancing with cutting-edge strategies and hands-on skills. Unleash your potential, master the art of generating passive income streams, and carve your path to success in the digital landscape with Alpha.</p>
                    @elseif($id == 3)
                    <h3 style="color:#ff439d;">{{$row->name}}</h3>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>04 COURSES + 5 BONUS COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>15+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>CUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Digital Skills Hub is your gateway to mastering the ever-evolving kingdom of digital marketing and Instagram domination. Elevate your online presence, explore and utilise the power of social media and unlock the secrets to creating compelling digital campaigns. Dive into advanced strategies, develop a loyal audience and drive your brand to new heights in the digital age with Digital Skills Hub.</p>
                    @elseif($id == 4)
                    <h3 style="color:#fcb32b;">{{$row->name}}</h3>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>06 COURSES + 9 BONUS COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>36+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>CUSTOMER SUPPORT</p>
                    </div>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>CERTIFICATES </p>
                    <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                            check
                        </span>Step into the Personal Branding Hub, where we teach you how to make a big impact online. Learn how to build your personal brand, become a pro at YouTube, master short videos like reels, and become skilled in video marketing and editing. With our easy-to-follow guidance, you'll boost your online presence and reach your goals faster than ever before!</p>
                    @else
                    <h3 style="color:#ff2951;">{{$row->name}}</h3>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                book_2
                            </span>10 COURSES + 15 BONUS COURSES</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                schedule
                            </span>80+ HOURS</p>
                    </div>
                    <div style="display:flex; gap:30px; ">
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>LIVE Q&A</p>
                        <p><span class="material-symbols-outlined" style="margin-right: 5px; vertical-align: middle;">
                                check
                            </span>CUSTOMER SUPPORT</p>
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
                                <a class="sec-btn anim" href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}"><span>BUY NOW</span> </a>
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/AffiliateMarketingBrambhastr.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/LeadGenerationCours.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/freelancing masterclass.png" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/socialMediaManagt-removebg-preview.png" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/mswordmocku.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/salesclosingmaster.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/howtogetfirstsal.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/instagrammastery.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/msexcelmaster.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/youtubemaster.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/facebookadsmaster.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/artofvideoeditin.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/canvaeditingmaster.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/reelsshortsmaster.jpeg" alt="">
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/videomarketingmaster.jpeg" alt="">
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
        <div class="course-count-details" id="iesc">
            <div class="course-count-inner">
                <div class="count-cont">
                    <div class="count"><span id="iesc1"></span></div>
                    <div class="count-head">Course</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="iesc2"></span>K+</div>
                    <div class="count-head">Students</div>
                </div>
                <div class="count-cont">
                    <div class="count"><span id="iesc3"></span>+</div>
                    <div class="count-head">Tutors</div>
                </div>
            </div>
        </div>
        <!-- course details section start here  -->
        <h1 class="course-details-heading">
            courses of Iconic
        </h1>
        <div class="course-detail-wrapper">
            <!-- 1 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/artofstorytellin.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            ART OF STORYTELLING
                        </div>
                        <div class="sec-card-description">
                            Explore our Art of Storytelling course! Learn how to tell captivating stories that keep your audience engaged. Whether you're new to storytelling or want to improve your skills, this course is for you. Join us and become a great storyteller!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1> 3 BENIFITS OF ART OF STORY TELLING COURSE 👇</h1>

                                    <p>1.The course covers a wide range of storytelling techniques</p>

                                    <p>2.We offer practical exercises and assignments to help students apply theoretical concepts in real-world storytelling scenarios.</p>

                                    <p>3.The course is designed to be flexible and accessible</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our standout courses is 'The Art of Storytelling,' where we teach you how to master the art of storytelling. Here's what you can expect to learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Storytelling Training: Whether you're new to storytelling or have some experience, this course covers everything you need to know to become a skilled storyteller.</p>

                                        <p>2. Understanding the Power of Storytelling: Learn why storytelling is important and how it can help you connect with your audience, inspire action, and make an impact.</p>

                                        <p>3. Crafting Compelling Stories: Discover techniques for crafting engaging and memorable stories that captivate your audience's attention and leave a lasting impression.</p>

                                        <p>4. Story Structure and Elements: Explore the key elements of storytelling, including plot, characters, setting, conflict, and resolution. Learn how to structure your stories for maximum impact.</p>

                                        <p>5. Finding Your Unique Voice Uncover your unique storytelling voice and style. Learn how to infuse your personality and perspective into your stories to make them authentic and relatable.</p>

                                        <p class="mar-top">
                                            Enroll in our 'Art of Storytelling' course today and unlock your potential to become a master storyteller. Whether you're a business professional, marketer, educator, or aspiring storyteller this course will help you unleash the power of storytelling to achieve your goals and inspire others."
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/communicationmaster.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            COMMUNICATION MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Communication Mastery! Learn how to communicate effectively in any situation. From speaking confidently to active listening, this course covers essential skills for success. Whether you're a beginner or looking to improve, join us and master communication!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF COMMUNICATION MASTERY 👇</h1>

                                    <p>1.Enhance your communication abilities from foundational principles to advanced techniques with Comprehensive Communication Skills Development.</p>
                                    <p>2.Navigate digital communication platforms seamlessly and craft impactful messages with Mastering Digital Communication Channels.</p>
                                    <p>3.Master the art of persuasion and influence outcomes effectively with Enhanced Influence and Persuasion.</p>
                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our top courses is called 'Communication Mastery.' This course is all about teaching you how to be really good at talking to people. Here's what you'll learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Learn Everything About Communication: Whether you're just starting out or you've talked to a lot of people before, this course covers everything you need to know about communicating well.</p>

                                        <p>2. Understand Why Communication Is Important: Find out why it's so important to be able to communicate effectively, whether it's at work, with friends, or in your everyday life.</p>

                                        <p>3. Learn to Talk Clearly: We'll teach you how to say what you mean in a way that's easy for others to understand, both with your words and your body language.</p>

                                        <p>4. Listen Better: Discover how to be a better listener, so you can really understand what others are saying and respond appropriately.</p>

                                        <p>5. Be More Confident: Learn how to speak up for yourself and express your ideas with confidence, whether you're talking to one person or a group.</p>
                                        <p class="mar-top">
                                            Sign up for our 'Communication Mastery' course now and start improving your communication skills. Whether you're at work, with friends, or anywhere else, this course will help you become a better communicator and achieve more success in all areas of your life.
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/contentwritingmaster.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            CONTENT WRITING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Content Writing Mastery! Learn how to create engaging and impactful content for any platform. From crafting compelling headlines to structuring articles, this course covers all aspects of content writing. Whether you're new to writing or want to sharpen your skills, join us and become a content writing expert!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENEFITS OF CONTENT WRITING MASTERY COURSE 👇</h1>

                                    <p>1.Learn diverse writing techniques for versatile content creation.</p>
                                    <p>2.Engage in practical exercises to apply theoretical concepts effectively.</p>
                                    <p>3.Enjoy the flexibility of a course designed to suit your schedule and preferences.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            Our Content Writing Mastery course is designed to hone your skills in crafting compelling written content. Here's what you can expect:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1.Comprehensive Content Writing Training: Whether you're a novice or seasoned writer, this course provides comprehensive training to enhance your content writing abilities.</p>

                                        <p>2.Understanding the Importance of Content: Discover why effective content creation is crucial in today's digital landscape, whether it's for websites, blogs, social media, or other platforms.</p>

                                        <p>3.Clarity and Conciseness: Learn techniques to convey your message clearly and concisely, ensuring that your writing resonates with your audience.</p>

                                        <p>4.Active Listening: Explore the importance of active listening in content creation, enabling you to understand your audience's needs and preferences better.</p>

                                        <p>5.Boost Confidence in Writing: Develop confidence in expressing your ideas through writing, whether it's for marketing materials, articles, or storytelling.</p>
                                        <p class="mar-top">
                                            Enroll in our Content Writing Mastery course today and elevate your writing skills to new heights. Whether you're aiming to improve your business's online presence or pursue a career in content creation, this course equips you with the tools to succeed.
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/copywritingmaster.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            COPY WRITING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Copywriting Mastery! Learn the art of persuasive writing to create compelling copy that sells. From crafting catchy headlines to writing convincing product descriptions, this course covers all aspects of copywriting. Whether you're a beginner or looking to improve your skills, join us and become a master copywriter!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF COPY WRITING 👇</h1>

                                    <p>1.Enhancing your creativity and ability to think outside the box</p>

                                    <p>2.Understanding consumer psychology and behavior to create effective campaigns</p>

                                    <p>3.Developing the skills to create compelling and engaging content</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our top courses is 'Content Writing.' This course teaches you all about creating great content. Here's what you'll learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Learn Everything About Content Writing: Whether you're just starting out or you've written a lot before this course covers everything you need to know about writing great content.</p>

                                        <p>2. Understand Why Content Writing Is Important: Find out why it's so important to be able to write well, whether it's for your website, blog, social media, or any other platform.</p>

                                        <p>3. Learn to Write Clearly: We'll teach you how to write in a way that's easy for others to understand whether you're explaining something complex or writing for a specific audience.</p>

                                        <p>4. Engage Your Readers: Discover how to capture your readers' attention and keep them interested from start to finish.</p>

                                        <p>5. Create Compelling Headlines: Learn how to craft headlines that grab attention and entice readers to click and read your content.</p>

                                        <p class="mar-top">
                                            Sign up for our 'Copy Writing' course now and start creating amazing content. Whether you're a blogger, marketer, entrepreneur or just someone who loves to write, this course will help you become a better content creator and achieve more success online.
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/emailmarketingcours.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            EMAIL MARKETING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Email Marketing Mastery! Learn how to send emails that get results for your business. From writing good content to reaching the right people, this course covers everything about email marketing. Join us and become an pro Email Marketer!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF EMAIL MARKETING 👇</h1>

                                    <p>1.Discover how to set up automated email campaigns for better engagement</p>

                                    <p>2.Learn to craft attention-grabbing subject lines that boost open rates.</p>

                                    <p>3.Understanding email deliverability and how to avoid being marked as spam</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our top courses is 'Email Marketing.' This course is all about learning how to use emails to communicate effectively with your audience. Here's what you'll learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Learn Everything About Email Marketing: Whether you're just starting out or you've sent a lot of emails before, this course covers everything you need to know about using emails to promote your business.</p>

                                        <p>2. Understand Why Email Marketing Is Important: Find out why sending emails is so important for businesses, and how it can help you reach more people and make more sales.</p>

                                        <p>3. Build and Grow Your Email List: Discover ways to collect email addresses from people who are interested in what you have to offer, and learn how to keep growing your list over time.</p>

                                        <p>4. Create Emails That People Want to Read: Learn how to write emails that grab people's attention and make them want to open and read them.</p>

                                        <p>5. Make Your Emails Look Great: Explore ways to design your emails so they look professional and appealing to your readers.</p>

                                        <p class="mar-top">
                                            Sign up for our 'Email Marketing' course now and start using the power of emails to grow your business. Whether you're a small business owner, marketer, or entrepreneur this course will help you get better at using emails to connect with your audience and achieve your goals.
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
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/Englishspeakingmaster.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            ENGLISH SPEAKING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to English Speaking Mastery! Improve your English speaking skills with our course. Learn how to speak confidently, improve your pronunciation, and expand your vocabulary. Whether you're a beginner or looking to enhance your skills, join us and master English speaking!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF ENGLISH SPEAKING COURSE 👇</h1>

                                    <p>1.Polish your grammar skills for more accurate and precise English usage.</p>

                                    <p>2.Learn new words and expressions to enrich your communication skills.</p>

                                    <p>3.Work on improving your fluency to speak more smoothly and naturally</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our top courses is 'English Speaking.' This course is designed to improve your spoken English skills. Here's what you can expect to learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Speaking Training: Whether you're a beginner or have some experience, this course covers everything you need to know to become a confident English speaker.</p>

                                        <p>2. Improving Pronunciation: Learn how to pronounce words correctly and speak with clarity and confidence.</p>

                                        <p>3. Expanding Vocabulary: Discover new words and phrases to expand your vocabulary and express yourself more effectively.</p>

                                        <p>4. Building Confidence: Gain confidence in speaking English by practicing speaking exercises and participating in conversations.</p>

                                        <p>5. Enhancing Fluency: Improve your fluency in English by practicing speaking regularly and learning common conversational phrases.</p>

                                        <p class="mar-top">
                                            Sign up for our 'English Speaking' course now and start improving your spoken English skills. Whether you're a student, professional or anyone looking to enhance their English communication skills this course will help you become a better English speaker and achieve your goals.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 7 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/linkedinmaster.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            LINKDIN MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to LinkedIn Mastery! Learn how to leverage LinkedIn for networking, job searching, and personal branding. From creating a standout profile to engaging with your network, this course covers all aspects of LinkedIn. Whether you're new to LinkedIn or want to enhance your skills, join us and become a LinkedIn pro!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF LINKDIN MASTERY 👇</h1>

                                    <p>1.Gain insights on how to effectively network and build relationships on LinkedIn.</p>

                                    <p>2.Learn how to use LinkedIn for lead generation and prospecting for your business.</p>

                                    <p>3.Understand how to use LinkedIn for personal branding and showcasing your expertise.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our flagship courses is 'LinkedIn Mastery,' designed to help you excel on the LinkedIn platform. Here's what you can expect to learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive LinkedIn Training: Whether you're new to LinkedIn or looking to enhance your presence, this course covers everything you need to know to master the platform.</p>

                                        <p>2. Optimizing Your Profile: Learn how to create a standout LinkedIn profile that showcases your skills, experience, and achievements effectively.</p>

                                        <p>3. Building a Professional Network: Discover strategies for expanding your network and connecting with relevant professionals in your industry.</p>

                                        <p>4. Engaging Content Creation: Explore techniques for creating engaging content on LinkedIn, including articles, posts, and videos, to position yourself as a thought leader in your field.</p>

                                        <p>5. Effective Networking and Relationship Building: Learn how to network strategically on LinkedIn, engage with your connections, and build meaningful professional relationships.</p>
                                        <p class="mar-top">
                                            Enroll in our 'LinkedIn Mastery' course today and unlock your potential to leverage LinkedIn effectively for professional growth and networking success. Whether you're a job seeker, entrepreneur, or professional looking to expand your network, this course will equip you with the skills and knowledge to thrive on LinkedIn.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 8 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/Publicspeakingcours.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            PUBLIC SPEAKING MASTERY
                        </div>
                        <div class="sec-card-description">
                            Welcome to Public Speaking Mastery! Learn how to speak confidently and effectively in front of any audience. From overcoming stage fright to delivering memorable presentations this course covers all aspects of Public Speaking. Whether you're a beginner or looking to improve your skills join us and become a confident Public Speaker!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF PUBLIC SPEAKING COURSE 👇</h1>

                                    <p>1.Overcoming fear of public speaking</p>

                                    <p>2.Enhanced presentation skills</p>

                                    <p>3.Increased ability to persuade and influence others</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our flagship courses is 'Public Speaking Mastery,' aimed at helping you become a confident and effective public speaker. Here's what you can expect to learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Public Speaking Training: Whether you're a beginner or have some experience, this course covers everything you need to know to master the art of public speaking.</p>

                                        <p>2. Overcoming Fear and Nervousness: Learn practical techniques to overcome stage fright and nervousness, allowing you to speak confidently in front of any audience.</p>

                                        <p>3. Developing Compelling Content: Discover how to structure your speeches effectively, craft engaging stories, and deliver powerful messages that resonate with your audience.</p>

                                        <p>4. Improving Delivery Skills: Explore techniques for enhancing your vocal variety, body language, and overall delivery to captivate and engage your audience.</p>

                                        <p>5. Adapting to Different Audiences: Gain insights into tailoring your message and delivery style to suit different audiences and speaking environments.</p>

                                        <p class="mar-top">
                                            Enroll in our 'Public Speaking Mastery' course today and unlock your potential to become a skilled and influential public speaker. Whether you're a professional, educator, entrepreneur, or anyone seeking to enhance their communication skills, this course will equip you with the tools and techniques to excel in public speaking.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 9 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/Timemanagementcours.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            TIME MANAGEMENT
                        </div>
                        <div class="sec-card-description">
                            Welcome to Time Management Mastery! Learn how to manage your time effectively and get more done. From setting goals to prioritizing tasks, this course covers all aspects of time management. Whether you're a busy professional or just looking to be more productive, join us and master the art of time management!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF TIME MANAGEMENT COURSES 👇</h1>

                                    <p>1.Time management courses often cover goal-setting techniques that can help you set realistic and achievable goals, both short-term and long-term.</p>

                                    <p>2.With better time management skills, you'll be able to focus on high-priority tasks, leading to enhanced performance and results in your work or studies.</p>

                                    <p>3. By learning how to eliminate distractions and stay focused on the task at hand, you'll be able to work more efficiently and with greater concentration.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our standout courses is 'Time Management Mastery,' designed to help you effectively manage your time and boost productivity. Here's what you can expect to learn:
                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Time Management Training: Whether you struggle with managing your time or want to enhance your skills further, this course covers everything you need to know to master the art of time management.</p>

                                        <p>2.Understanding the Importance of Time Management: Learn why effective time management is crucial for personal and professional success, and how it can help you achieve your goals more efficiently.</p>

                                        <p>3. Setting Goals and Priorities: Discover techniques for setting clear and achievable goals, and prioritizing tasks based on their importance and urgency.</p>

                                        <p>4. Planning and Organization: Explore strategies for planning your day, week, and month effectively, and organizing your tasks and schedule for maximum productivity.</p>

                                        <p>5. Overcoming Procrastination: Learn practical tips and tools for overcoming procrastination and staying focused and motivated to accomplish your tasks and goals.</p>

                                        <p class="mar-top">
                                            Enroll in our 'Time Management Mastery' course today and unlock your potential to take control of your time and achieve greater productivity and success. Whether you're a student, professional, entrepreneur or anyone looking to make the most of their time this course will equip you with the skills and strategies to effectively manage your time and accomplish your goals.
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 10 -->
            <div class="secondry-card">
                <div class="secondry-card-wrapper">
                    <div class="img-box">
                        <img src="{{url('public/frontend/home/')}}/assets/images/coursesDetail/websitedevelopmentcours.jpeg" alt="">
                    </div>
                    <div class="card-text-cont-box">
                        <div class="sec-card-heading">
                            WEBSITE DEVELOPMENT
                        </div>
                        <div class="sec-card-description">
                            Welcome to Website Development! Learn how to create and design websites from scratch. From basic HTML to advanced CSS and JavaScript, this course covers everything you need to know to build your own website. Whether you're a beginner or looking to enhance your skills, join us and become a website development pro!
                        </div>
                        <div class="learmore-sec-card">
                            <details>
                                <summary class="btn-learn-more">LEARN MORE <i class="fa-solid fa-angles-right" style="margin-left: 10px;"></i></summary>
                                <div class="learn-more-details">
                                    <h1>3 BENIFITS OF WEBSITE DEVELOPMENT COURSES 👇</h1>

                                    <p>1.You'll learn about design principles that can help you create visually appealing and user-friendly websites.</p>

                                    <p>2.Learn how to create websites that not only look great but also provide an intuitive and smooth user experience, keeping visitors engaged.</p>

                                    <p>3.Understand how to build e-commerce websites, including payment gateway integration, product listings, and security measures.</p>

                                    <h1 class="mar-top">Description</h1>

                                    <div>
                                        <p>
                                            One of our flagship courses is 'Website Development,' designed to teach you how to build and design websites. Here's what you can expect to learn:

                                        </p>

                                        <p class="mar-top">
                                            Key Highlights:
                                        </p>

                                        <p>1. Comprehensive Website Development Training: Whether you're a beginner or have some experience, this course covers everything you need to know to master the art of building websites.</p>

                                        <p>2. Understanding the Basics: Learn the fundamental concepts of website development, including HTML, CSS, and JavaScript, to create and customize web pages.</p>

                                        <p>3. Choosing the Right Tools: Explore different website development tools and platforms, such as WordPress, Wix, and Squarespace, to build websites efficiently and effectively.</p>

                                        <p>4. Design Principles: Discover principles of web design, including layout, typography, color theory, and user experience (UX) design, to create visually appealing and user-friendly websites.</p>

                                        <p>5. Responsive Design: Learn how to design websites that are responsive and adaptable to different devices and screen sizes, ensuring a seamless user experience across desktops, tablets, and mobile phones.</p>

                                        <p class="mar-top">
                                            Enroll in our 'Website Development' course today and unlock your potential to become a skilled website developer. Whether you're a student, entrepreneur or aspiring web developer this course will equip you with the skills and knowledge to create professional and functional websites that meet the needs of your clients or business."
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="bottom-buy-now-btn" id="bbnb">
        @foreach($allPackages as $row)
        @if($row->id == $id)
        <div class="bottom-buy-cont">
            <!-- <h2>3999 /-</h2>
                                    <a class="pri-btn" href="#" style="color:#000">Buy Now</a> -->

            @if(!empty($tempArr) && $orderStatus == 1 && in_array($row->id,$tempArr))

            <div class="btn-cont1">
                <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                    <a class="bottm-buybtn" href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();">Upgrade Now</a>
                </form>
            </div>

            @elseif(auth()->user() && $orderStatus == 0)
            <div class="btn-cont1">
                <form method="POST" name="banner-form" id="packages{{$row->id}}" action="{{url('user/upgrade-courses')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_sessionToken" value="{{encryptor('encrypt', $row->id)}}">
                    <a class="bottm-buybtn" href="javascript:void(0);" onclick="document.getElementById('packages{{$row->id}}').submit();"><span>BUY NOW</span></a>
                </form>
            </div>
            @elseif($packageId != $row->id && $packageId < $row->id)
                <div class="btn-cont1">
                    <a class="bottm-buybtn" href="{{ url('signup?guest='.encryptor('encrypt', $row->id)) }}"><span>BUY NOW</span> </a>
                </div>
                @endif
        </div>
        @endif
        @endforeach

    </div>

    <div class="bottom-sug-card-cont">
        @if($id == 2)

        @elseif($id == 3)
        <h1 class="course-details-heading1" >Previous Courses Added to Your Subscription</h1>
        <div class="sug-card-wrapper">
            <div class="sug-card">
                <div class="card-img-box">
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="">
                </div>
                <div class="card-text-cont">
                    <h1>alpha</h1>
                    <a href="{{ url('/elob-courses/2') }}">Learn More</a>
                </div>
            </div>
        </div>

        @elseif($id == 4)
        <h1 class="course-details-heading1" >Previous Courses Added to Your Subscription</h1>
        <div class="sug-card-wrapper">
            <div class="sug-card">
                <div class="card-img-box">
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="">
                </div>
                <div class="card-text-cont">
                    <h1>alpha</h1>
                    <a href="{{ url('/elob-courses/2') }}">Learn More</a>
                </div>
            </div>
            <div class="sug-card">
                <div class="card-img-box">
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/DIDIS3D.png" alt="">
                </div>
                <div class="card-text-cont">
                    <h1>digital skills hub</h1>
                    <a href="{{ url('/elob-courses/3') }}">Learn More</a>
                </div>
            </div>
        </div>

        @else
        <h1 class="course-details-heading1" >Previous Courses Added to Your Subscription</h1>
        <div class="sug-card-wrapper">
        <div class="sug-card">
                <div class="card-img-box">
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/ALPHA_3D_21.png" alt="">
                </div>
                <div class="card-text-cont">
                    <h1>alpha</h1>
                    <a href="{{ url('/elob-courses/2') }}">Learn More</a>
                </div>
            </div>
            <div class="sug-card">
                <div class="card-img-box">
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/2-PERSONAL3D2.png" alt="">
                </div>
                <div class="card-text-cont">
                    <h1>digital skills hub</h1>
                    <a href="{{ url('/elob-courses/3') }}">Learn More</a>
                </div>
            </div>
            <div class="sug-card">
                <div class="card-img-box">
                    <img src="{{url('public/frontend/home/')}}/assets/images/3d-img/DIDIS3D.png" alt="">
                </div>
                <div class="card-text-cont">
                    <h1>personal branding hub</h1>
                    <a href="{{ url('/elob-courses/4') }}">Learn More</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


















@endsection