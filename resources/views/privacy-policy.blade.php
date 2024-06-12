@extends('layouts.frontend.index')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        max-width: 900px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section-heading {
        font-size: 24px;
        margin-top: 20px;
    }

    .section-divider {
        border: 0;
        height: 2px;
        background: #333;
        margin: 10px 0;
    }

    .section-paragraph,
    .section-list-item {
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .section-list {
        padding-left: 20px;
    }

    .section-list-item {
        margin-bottom: 10px;
    }

    .section-link {
        color: #007BFF;
        text-decoration: none;
    }

    .section-link:hover {
        text-decoration: underline;
    }
</style>
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
        <div class="wc-courses-heading aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
            <h4 class="section-heading">Privacy Policy</h4> 
            <hr class="section-divider">
            <p class="section-paragraph">This Privacy Policy describes how Growth Addicted and its subsidiaries and connected entities gather, utilize, and share information about you (collectively, "Growth Addicted," "we" or "us"). This Privacy Statement applies to information we collect when you use our website, mobile applications, and other goods and services (collectively, the "Services"), or when you interact with us in any other way.</p>

            <p class="section-paragraph">We reserve the right to modify this Privacy Statement at any time. If we make changes, we will update the "Last Updated" date at the bottom of this policy to tell you. We urge you to examine our Privacy Policy anytime you utilize the Services so that you are aware of our information practices and how you may help safeguard your privacy.</p>

            <h4 class="section-heading">Information Gathering</h4>
            <hr class="section-divider">
            <p class="section-paragraph">We gather information that you supply to us directly. For example, when you create an account, participate in any interactive features of the Services, participate in a survey, contest, or promotion, subscribe to a newsletter or email list, purchase, access, or download content through the Services, refer others to the Services, apply for a job, interact with us via third-party social media sites, request customer support, or otherwise communicate with us, we collect information. Your name, email address, username, password, postal address, phone number, language preference, payment information (such as your credit or debit card), and any other information you choose to submit are examples of the sorts of information we may collect.</p>

            <p class="section-paragraph">In some situations, we may also collect information about people that you give. For example, if you recommend a friend or family member to the Services, we may collect information such as the recipient's email address. When you use the Services, we automatically collect information about you.</p>

            <p class="section-paragraph">We collect information regarding your use of the Services, such as your Internet Protocol ("IP") address, web request, access times, pages seen, material purchased, accessed, downloaded, or burned, web browser, links clicked, and the website you visited before going to the Services.</p>

            <p class="section-paragraph">We gather information about the mobile device or computer that you use to access our Services, such as the hardware model, operating system and version, unique device identifiers, and mobile network information.</p>

            <p class="section-paragraph">Location Information: We may collect information about the location of your device when you access or use our Services, or when you otherwise consent to the acquisition of this information. Please check "Your Options" below for additional information. Cookies and other tracking technologies collect the following information: Cookies are little pieces of software code sent to your browser by a website when you access information on that site. This site employs cookies to help us improve our Services and your experience, as well as to determine which parts and features of our Services are popular and to track visits. Web beacons may also be used to collect information (also known as "tracking pixels"). Web beacons are electronic pictures that may be used in our Services or emails to assist in the delivery of cookies, the counting of visits, the understanding of usage and campaign effectiveness, and the determination of whether an email has been viewed and acted upon. Please read "Your Choices" below for more information on cookies and how to disable them.</p>

            <h4 class="section-heading">Information Obtained from Other Sources</h4>
            <hr class="section-divider">
            <p class="section-paragraph">We may also gather information from other sources and combine it with data collected through the Services. For example, if you sign up for an account using your credentials from a third-party social media site, we will have access to certain information from that site, such as your name and account information, in accordance with the authorization procedures established by such third-party social media sites.</p>

            <h4 class="section-heading">Information Utilization</h4>
            <hr class="section-divider">
            <p class="section-paragraph">Growth Addicted does not sell any of its users' personal information or data. We may use information about you for a variety of purposes, such as:</p>

            <h4 class="section-heading">Our Services are provided, maintained, and improved.</h4>
            <hr class="section-divider">
            <p class="section-paragraph">Provide and deliver the requested services, execute transactions, and give you associated information such as confirmations and bills.</p>
            <p class="section-paragraph">Technical notices, upgrades, security warnings, and support and administrative communications will be sent to you.</p>
            <p class="section-paragraph">Provide customer assistance in response to your comments, questions, and requests.</p>

            <p class="section-paragraph">Communicate with you about Growth Addicted and others' products, services, offers, promotions, and events, as well as deliver news and other information we believe will be of interest to you. Trends, use, and actions related to our Services are being monitored and analyzed. Personalize and improve the Services, as well as deliver advertising, material, or features that are relevant to your interests and choices. Processing and distribution of contest or promotion submissions and prizes. Connect or combine information from different sources to better understand your requirements and provide you with better service. Perform advertising and analytics services (described below). Execute any additional purpose for which the data was gathered.</p>

            <h4 class="section-heading">Social Sharing Options</h4>
            <hr class="section-divider">
            <p class="section-paragraph">The Services may include social sharing features and other integrated tools (for example, the Facebook "Like" button) that allow you to share activities you perform on the Services with other media, and vice versa. The usage of such features allows you to share information with your friends or the general public, based on the settings you specify through the Services and with the company that offers the social sharing function.</p>

            <h4 class="section-heading">Services for Advertising and Analytics</h4>
            <hr class="section-divider">
            <p class="section-paragraph">We may enable companies to display you adverts and provide analytics services throughout the Internet. Cookies, web beacons, and other technologies may be used by these organizations to gather information about your use of the Services and other websites. Growth Addicted and others may use your information to analyze and track statistics, gauge the popularity of specific content, present advertising and content tailored to your interests on our Services and other websites, and better understand your online activities. We or a data partner we have engaged may collect, store, and share a unique identifier associated with your mobile device in order to deliver customized ads or content while you use applications or browse the internet, or to attempt to identify you in a unique manner across other devices or browsers. We or a data partner may link and/or share aggregated or de-identified demographic or other data you freely gave to us, or data gathered from you that cannot reasonably be used to identify you, in order to personalise these advertising or content.</p>

            <h4 class="section-heading">Security</h4>
            <hr class="section-divider">
            <p class="section-paragraph">Growth Addicted takes reasonable precautions to protect your personal information against loss, theft, misuse, and unauthorized access, disclosure, modification, and destruction.</p>

            <h4 class="section-heading">Your Alternatives</h4>
            <hr class="section-divider">
            <h4 class="section-heading">Account Details</h4>
            <hr class="section-divider">
            <p class="section-paragraph">You may change your online account information at any time by logging into your account and modifying your profile information, or by sending an email to us as specified below. If you wish to cancel your account, please send an email request to us; however, please keep in mind that we may save some information as needed by law or for legitimate business reasons. We may also keep cached or archived copies of your information for a period of time.</p>

            <h4 class="section-heading">Information from Your Mobile Device</h4>
            <hr class="section-divider">
            <p class="section-paragraph">Certain features of our mobile applications may require access to your device's contacts list, photo storage application, or other information. You may stop the collection of this information at any time by adjusting the settings on your mobile device.</p>

            <h4 class="section-heading">Cookies</h4>
            <hr class="section-divider">
            <p class="section-paragraph">Most web browsers automatically accept cookies. You can configure your browser to remove or reject browser cookies if you want. Please keep in mind that removing or rejecting cookies may have an impact on the availability and performance of our Services.</p>

            <h4 class="section-heading">Marketing Communications</h4>
            <hr class="section-divider">
            <p class="section-paragraph">You can unsubscribe from Growth Addicted promotional mailings by following the instructions in such communications or by signing into your online account and adjusting your settings. We may still send you non-promotional emails, such as those concerning your account or our ongoing business relationships, if you opt out.</p>

            <h4 class="section-heading">Notifications/Alerts through Push</h4>
            <hr class="section-divider">
            <p class="section-paragraph">We may send push notifications or alerts to your mobile device with your permission. You may turn off these messages at any moment by altering your mobile device's notification settings.</p>

            <p class="section-paragraph">This Agreement, together with our Terms of Use, EULA, and any other rules, regulations, procedures, and policies thus included or prescribed or updated on any future date, is the complete agreement between you and Growth Addicted with respect to the Service. Growth Addicted retains the right to change the policies at any time and will publicize any changes on this page. You should review these privacy policies frequently to keep current on the policies that apply to your use of the Service, Software, website, mobile applications, and content. No delay or omission to act under this Agreement shall constitute a waiver of any provision of this Agreement by Growth Addicted.</p>

            <p class="section-paragraph">If you have any questions or concerns regarding our Privacy Policy, please contact us using the details given on our official website or mobile application.</p>

            <h4 class="section-heading">Affiliate Policy</h4>
            <hr class="section-divider">
            <ul class="section-list">
                <li class="section-list-item">We will cancel all your funds and hold all your pending amount in company’s bank account if you work for another firm that has the same concept, foundation, and business format as Growth Addicted.</li>
                <li class="section-list-item">If you are caught poaching/approaching our affiliates into other affiliate marketing organizations, you will no longer be eligible for our affiliate marketing program, but you will still be allowed to access the courses.</li>
                <li class="section-list-item">You will no longer be eligible for our affiliate marketing program, but you will be able to access the courses if you are discovered harassing any of our affiliates, employees, or management.</li>
                <li class="section-list-item">This ensures that you do not utilize any unethical methods to expand your business here; otherwise, you will no longer be eligible for our affiliate marketing program, but you will still be able to access the courses.</li>
                <li class="section-list-item">That all affiliates would adhere to the highest standards of honesty and ethics in the Growth Addicted Business.</li>
                <li class="section-list-item">That the affiliates would correctly and honestly deliver the Company's marketing plan, clearly depicting the degree of work necessary to achieve success. During interactions with prospective affiliates, affiliates shall not engage in misleading, fraudulent, deceptive, or unfair recruitment methods, including misrepresentation of real or anticipated sales or earnings and business benefits.</li>
                <li class="section-list-item">That the affiliates will not make derogatory or disparaging statements about the Company, its products, courses, executives, employees, or other individuals or goods. Affiliates will be courteous to both the Company and the affiliate marketing industry.</li>
                <li class="section-list-item">That the affiliates will not utilize the Company's trade name(s), information, literature, advertising material, gathering of people, or other resources, including Intellectual Property, to introduce and promote the interests of any entity other than the Company.</li>
                <li class="section-list-item">That the affiliates will work hard to guarantee that my customers and fellow affiliates are happy with the Company's products and services.</li>
                <li class="section-list-item">That the affiliates will follow the Growth Addicted Affiliate’s Rules and Regulations at all times, if we found any affiliate breaking any rule, we will cancel all the funds of that affiliate and all the funds will be counted under company’s material.</li>
                <li class="section-list-item">That the affiliates will not do any fraudulent act in promoting the Company's business to the detriment of the Company and other affiliates.</li>
                <li class="section-list-item">That while distributorship and subsequently, the affiliates will not do anything that may harm the Company, its reputation, or economic interests.</li>
                <li class="section-list-item">The affiliates must not engage in misleading, deceptive, or unfair trading practices.</li>
                <li class="section-list-item">That the affiliates will take reasonable means to secure the private information submitted to me by customers.</li>
                <li class="section-list-item">You can not start your own affiliate company without giving 2 months’ notice, if we found doing so then your funds and all the pending amount will be under growth addiction. And that will be nonrefundable.</li>
            </ul>
        </div>
    </div>
    </div>





    @endsection