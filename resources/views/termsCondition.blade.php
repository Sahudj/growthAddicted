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

   .wc-courses-heading h4,
    h5 {
        color: #010529;
    }

    .wc-courses-heading hr {
        border: 0;
        height: 2px;
        background: #333;
        margin: 10px 0;
    }

    .wc-courses-heading p {
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .wc-courses-heading ul {
        padding-left: 20px;
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
                        <h4>Terms and conditions </h4>

                        <h5>Introduction to the Terms and Conditions </h5>
                        <hr>

                        <p>Growth Addicted ("Company", "we", "our", "our") welcomes you!

                            These Terms of Service ("Terms", "Terms of Service") govern your use of growthaddicted.com (collectively or individually "Service"), which is maintained by growth addicted. </p>

                        <p>Our Privacy Policy also regulates your use of our Service and describes how we collect, protect, and share information resulting from your use of our web sites.</p>

                        <p>These Terms and our Privacy Policy ("Agreements") are part of your agreement with us. You acknowledge having read and comprehended the Agreements and agree to be bound by them.
                            If you do not agree with (or are unable to comply with) the Agreements, you may not use the Service; nevertheless, please notify us by contacting care@growthaddicted.com so that we may attempt to find a solution. All visitors, users, and others who seek to access or use the Service are subject to these Terms.</p>



                        <h4>Communications</h4>
                        <hr>

                        <p>You agree to receive newsletters, marketing or promotional materials, and other information from us by using our Service. You may, however, choose not to receive any or all of these emails from us by clicking the unsubscribe link or contacting care@growthaddicted.com.
                            Purchases</p>


                        <p>If you desire to purchase any goods or service made available via the Service ("Purchase"), you may be requested to provide certain information related to your Purchase, such as your credit or debit card number, card expiration date, billing address, and shipping information.</p>



                        <p>You represent and warrant that: I you are legally entitled to use any card(s) or other payment method(s) in connection with any Purchase; and (ii) the information you provide to us is accurate, correct, and full.</p>

                        <p>We may use the usage of third-party services to facilitate payment and the fulfillment of Purchases. By entering your information, you allow us permission to share it with these third parties in accordance with our Privacy Policy.
                            We retain the right to refuse or cancel your purchase at any time for any reason, including but not limited to: product or service availability, inaccuracies in the description or price of the product or service, errors in your order, or other reasons.</p>

                        <p>If we suspect fraud or an unauthorized or unlawful transaction, we retain the right to refuse or cancel your order.
                            Promotions, Sweepstakes, and Contests

                            Any competitions, sweepstakes, or other promotions made accessible through the Service (collectively, "Promotions") may be governed by rules that are different from these Terms of Service. Please read the applicable regulations as well as our Privacy Policy before participating in any Promotions. If the terms of a Promotion conflict with these Terms of Service, the rules of the Promotion shall take precedence.</p>

                        <h4>Subscriptions </h4>
                        <hr>
                        <p>Some aspects of the Service are priced on a monthly or annual basis ("Subscription(s)"). On a recurrent and periodic basis, you will be invoiced in advance ("Billing Cycle"). When you purchase a Subscription, the billing cycle will be determined by the sort of subscription plan you choose.</p>



                        <p>Your Subscription will automatically renew at the end of each Billing Cycle until you cancel it or growth addicted cancels it. You may cancel your Subscription renewal using your online account management page or by emailing our customer service staff at care@growthaddicted.com.
                            To pay for your membership, you must use a valid payment method. You must give accurate and complete billing information to Growth Addicted , which may include but is not limited to full name, address, state, postal or zip code, telephone number, and a valid payment method information. By entering such payment information, you automatically enable Growth Addicted to charge any such payment instruments for any Subscription costs incurred through your account.</p>

                        <p>If automatic billing fails for any reason, Growth Addicted retains the right to immediately discontinue your access to the Service.</p>

                        <h4>Refunds</h4>
                        <hr>
                        <p>We provide refunds for orders placed within 2 hours of the packages being purchased.</p>

                        <p>A payment gateway charge of 2% of the amount paid and a processing fee of 5% of the amount paid will be deducted from the amount to be reimbursed.</p>

                        <p>Under any circumstances, no refund will be offered to the client for the purchase of any package made directly from the Growth Addicted website "www.growthaddicted.com" or through the affiliate link of the person who directed him to the Growth Addicted website after 2 hours of the transaction.</p>

                        <p>To request a refund, please send an email to care@growthaddicted.com. Only use the following format with your registered e-mail ID.</p>

                        <p>
                        <p>Full Name -</p>

                        <p>Registered email address -</p>



                        <p>Date of registration -</p>



                        <p>Screenshot of Payment Invoice with Date and Time (You should have gotten this through email/message when you paid) -</p>



                        <p>The reason for the refund -</p>



                        <p>*Without the above-mentioned information, no refund request will be considered.</p>



                        <p>Please keep in mind that for the "Refund," you must contact us solely at <strong>care@growthaddicted.com</strong>.</p>

                        <h4>Content</h4>
                        <hr>

                        <p>Our Service enables you to upload, connect, store, distribute, and otherwise make available certain information, text, images, videos, or other material (collectively, "Content"). You are entirely responsible for the Content you submit on or via the Service, including its legality, dependability, and appropriateness.</p>

                        <p>By posting Content on or through the Service, You represent and warrant that: I the Content is yours (you own it) and/or you have the right to use it and the right to grant us the rights and license set forth in these Terms, and (ii) the posting of your Content on or through the Service does not violate any person's or entity's privacy, publicity, copyright, contract, or other rights. We have the right to cancel anyone's account who is discovered to be infringing on a copyright.</p>

                        <p>You retain all rights to any and all Content that you submit, publish, or display on or via the Service, and you are responsible for safeguarding such rights. We accept no responsibility and assume no liability for any Content posted on or via the Service by you or any other party. However, by posting Content on or via the Service, you grant us the right and permission to use, alter, publicly perform, publicly display, reproduce, and distribute such Content. You agree that this license includes the right for us to make your Content available to other Service users, who may use it in accordance with these Terms.
                            Growth has the right, but not the duty, to monitor and modify all User Content.</p>

                        <p>Furthermore, the Content accessed on or via this Service is the property of Growth Addicted or is utilized with permission. Without our express prior written consent, you may not distribute, edit, transmit, reuse, download, repost, copy, or use said Content, in whole or in part, for commercial or personal advantage.</p>

                        <h4>Prohibited Applications</h4>
                        <hr>
                        <p>You may only use the Service for legitimate purposes and in compliance with the Terms. You agree to refrain from using the Service: </p>

                        <ul>
                            <li>Violates any applicable national or international law or rule.</li>
                            <li>With the intent of exploiting, damaging, or trying to exploit or damage children in any way, including by exposing them to unsuitable content.</li>
                            <li>To transmit or arrange for the transmission of any commercial or promotional material, including "junk mail," "chain letters," "spam," or any other similar solicitation.</li>
                            <li> Impersonation or attempted impersonation of the Company, a Company employee, another user, or any other person or entity.</li>
                            <li>In any way that violates the rights of others, is illegal, threatening, fraudulent, or hurtful, or is connected with any unlawful, illegal, fraudulent, or harmful purpose or conduct.</li>
                            <li>Engage in any other behavior that restricts or inhibits anyone's use or enjoyment of the Service, or which, in our opinion, may hurt or offend the Company or Service users, or subject them to liability.</li>
                        </ul>

                        <h4>Furthermore, you agree not to:</h4>
                        <hr>
                        <ul>
                            <li> Use the Service in any way that might disable, overburden, damage, or impair it, or interfere with the use of the Service by any other party, including their ability to engage in real-time activities through the Service.</li>
                            <li> Use any robot, spider, or other automated device, method, or means to access Service for any purpose, including monitoring or duplicating any of the Service's content.</li>
                            <li>Without our prior written authorization, use any manual procedure to monitor or copy any of the material on the Service or for any other unlawful purpose.</li>
                            <li> Use any equipment, program, or procedure that disrupts the correct operation of the Service.</li>
                            <li>Inject any dangerous or technologically destructive viruses, trojan horses, worms, logic bombs, or other stuff.</li>
                            <li>Make an unauthorized attempt to gain access to, interfere with, damage, or disrupt any components of the Service, the server on which the Service is housed, or any server, computer, or database connected to the Service.</li>
                            <li>Launch a denial-of-service or distributed denial-of-service attack on Service.</li>
                            <li>Take any activity that may harm or deceive the Company's rating.</li>
                            <li> Otherwise, seek to obstruct the correct operation of the Service.
                                Analytics</li>
                        </ul>

                        <p> We may utilize third-party Service Providers to monitor and analyze how our Service is used.
                            Accounts</p>


                        <p>When you establish an account with us, you promise that the information you supply us is always accurate, full, and up to date. Incorrect, incomplete, or out-of-date information may result in the immediate cancellation of your Service account.</p>



                        <p>You are responsible for keeping your account and password secure, including, but not limited to, restricting access to your computer and/or account. You agree to take responsibility for any and all activities or actions that occur under your account and/or password, whether such activities or actions occur with our Service or a third-party service. You must contact us promptly if you become aware of any security breach or unauthorized use of your account.</p>

                        <p>You may not use as a username the name of another person or entity, a name or trademark that is subject to the rights of another person or entity other than you, or a name or trademark that is not lawfully available for use. Any name that is derogatory, vulgar, or indecent may not be used as a username.</p>

                        <p>In our sole discretion, we have the right to reject service, terminate accounts, remove or edit content, or cancel orders.
                            You may not use as a username the name of another person or entity, a name or trademark that is subject to the rights of another person or entity other than you, or a name or trademark that is not lawfully available for use. Any name that is disparaging, vulgar, or obscene may not be used as a username.</p>

                        <p>We have the right to refuse service, terminate accounts, remove or edit content, and cancel purchases in our absolute discretion.</p>

                        <h4>Intellectual Property Rights</h4>
                        <hr>
                        <p>Growth Addicted and its licensors own the service and its original content (excluding material submitted by users), features, and functionality. The service is protected by copyright, trademark, and other laws in the United States and other countries. Without the prior written approval of Growth Addicted, our trademarks may not be utilized in connection with any product or service.</p>

                        <h4>Copyright Policy</h4>

                        <p>We respect the intellectual property rights of others. It is our policy to react to any accusation that Content submitted on the Service infringes on the copyright or other intellectual property rights of any person or entity ("Infringement").</p>



                        <p>If you are a copyright owner, or authorized on behalf of one, and believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to care@growthaddicted.com, with the subject line: "Copyright Infringement," and include in your claim a detailed description of the alleged Infringement as detailed below, under "DMCA Notice and Procedure for Copyright Infringement Claims."
                            You may be held liable for damages (including costs and attorneys' fees) for misrepresentation or bad-faith claims based on the violation of your copyright by any Content discovered on and/or via the Service.</p>

                        <h4>DMCA Notice and Procedure for Copyright Infringement Claims</h4>

                        <p>You may file a notification under the Digital Millennium Copyright Act (DMCA) by providing our Copyright Agent with the following information in writing (see 17 U.S.C. 512(c)(3) for more details):</p>
                        <ul>
                            <li>0.1. an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest;</li>
                            <li>0.2. a description of the copyrighted work that you allege has been infringed, including the URL (i.e., web page address) of the site where the copyrighted work resides or a copy of the copyrighted work;</li>
                            <li>0.3. identification of the URL or other exact place on the Service where the allegedly infringing item can be found;</li>
                            <li>0.4. your home address, phone number, and email address.</li>
                            <li>0.5. a statement from you stating that you believe the disputed use is not permitted by the copyright owner, its agent, or the law;</li>
                            <li>0.6. a declaration by you, under penalty of perjury, that the information in your notice is correct and that you are the copyright owner or have authority to act on the copyright owner's behalf.</li>
                            <li>0.7. You can reach our Copyright Agent at care@growthaddicted.com.</li>

                        </ul>


                        <h4> Feedback and Error Reporting</h4>

                        <p>You may give us with information and feedback about errors, suggestions for improvements, ideas, issues, complaints, and other topics relating to our Service ("Feedback"), either directly at care@growthaddicted.com or through third-party sites and platforms. You acknowledge and agree that: I you will not retain, acquire, or assert any intellectual property right or other right, title, or interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback; (iii) Feedback does not contain confidential or proprietary information from you or any third party; and (iv) Company is under no confidentiality obligation with respect to the Feedback.

                        <h4> Other Websites' Links </h4>
                        <hr>
                        <p>Our Service may contain links to third-party websites or services not owned or managed by Growth Addicted.</p>

                        <p>Growth Addicted has no control over, and accepts no responsibility for, the content, privacy policies, or practices of third-party websites or services. We do not endorse any of these entities/individuals or their websites.</p>

                        <p> We may use your contact information to contact (call/SMS) you via a third-party platform/vendor.
                            YOU ACKNOWLEDGE AND AGREE THAT COMPANY SHALL NOT BE LIABLE, DIRECTLY OR INDIRECTLY, FOR ANY DAMAGE OR LOSS CAUSED OR ALLEGED TO BE CAUSED BY OR IN CONNECTION WITH THE USE OF OR RELIANCE ON ANY SUCH CONTENT, GOODS, OR SERVICES AVAILABLE ON OR THROUGH ANY SUCH THIRD PARTY WEB SITES OR SERVICES.</p>

                        <p> WE STRONGLY RECOMMEND THAT YOU READ THE TERMS OF SERVICE AND PRIVACY POLICIES OF ANY THIRD-PARTY WEB SITES OR SERVICES YOU VISIT.</p>

                        <h4>Warranty Exclusion</h4>

                        <p>COMPANY PROVIDES THESE SERVICES ON AN "AS IS" AND "AS AVAILABLE" BASIS. COMPANY MAKES NO EXPRESS OR IMPLIED REPRESENTATIONS OR WARRANTIES OF ANY KIND AS TO THE OPERATION OF THEIR SERVICES OR THE INFORMATION, CONTENT, OR MATERIALS INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR USE OF THESE SERVICES, THEIR CONTENT, AND ANY SERVICES OR ITEMS OBTAINED FROM US IS DONE SOLELY AT YOUR OWN RISK.
                            THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR AVAILABILITY OF THE SERVICES IS NOT WARRANTED OR REPRESENTED BY COMPANY OR ANYONE ASSOCIATED WITH COMPANY. WITHOUT LIMITING THE GENERALITY OF THE FOREGOING, NEITHER COMPANY NOR ANYONE ASSOCIATED WITH COMPANY REPRESENTS OR WARRANTS THAT THE SERVICES, THEIR CONTENT, OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL BE ACCURATE, RELIABLE, ERROR-FREE, OR UNINTERRUPTED, THAT DEFECTS WILL BE CORRECTED, THAT THE SERVICES OR THE SERVER
                            COMPANY HEREBY DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, STATUTORY OR OTHERWISE, INCLUDING BUT NOT LIMITED TO MERCHANTABILITY, NON-INFRINGEMENT, AND FITNESS FOR PARTICULAR PURPOSE.</p>

                        <p>THE FOREGOING DOES NOT APPLY TO ANY WARRANTIES THAT CANNOT BE EXCLUDED OR LIMITED BY LAW.
                            Limitation Of Liability
                            EXCEPT AS PROHIBITED BY LAW, YOU WILL HOLD US AND OUR OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS HARMLESS FOR ANY INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGE, HOWEVER IT ARISES (INCLUDING ATTORNEYS’ FEES AND ALL RELATED COSTS AND EXPENSES OF LITIGATION AND ARBITRATION, OR AT TRIAL OR ON APPEAL, IF ANY, WHETHER OR NOT LITIGATION OR ARBITRATION IS INSTITUTED), WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE, ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY YOU OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES, RULES, OR REGULATIONS, EVEN IF COMPANY HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF COMPANY, IT WILL BE LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES, AND UNDER NO CIRCUMSTANCES WILL THERE BE CONSEQUENTIAL OR PUNITIVE DAMAGES. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO YOU.</p>

                        <h4>Termination </h4>

                        <p>We may cancel or suspend your account and deny access to the Service at any time, without prior notice or responsibility, for any reason whatsoever and without restriction, including but not limited to a breach of the Terms. </p>

                        <p>If you want to terminate your account, just stop using the Service.</p>

                        <p>All provisions of the Terms that, by their nature, should survive termination shall do so, including, without limitation, ownership provisions, warranty disclaimers, indemnification, and liability limitations. </p>

                        <h4>Be cautious of fraudulent activities. </h4>
                        <hr>
                        <p> Please bear the following in mind: </p>

                        <ul>
                            <li>To connect with our users and affiliates, the Growth Addicted Support Team exclusively utilizes official email addresses with the domain extension @growthaddicted.com (such as care@growthaddicted.com) and growthaddicted@gmail.com. Please refrain from communicating with any other email address.</li>
                            <li>The Growth Addicted Support Team will never ask you for an OTP, your Growth Addicted account password, or any other type of password. Be wary of anyone requesting the same from you.</li>
                            <li> If someone from the Affiliate/Customer Support team asks you to give any information, such as your registered phone number or email address, please do so exclusively through the Growth Addicted chatbot or an email address with the extension care@growthaddicted.com
                                5) Growth Addicted exclusively utilizes the official social media handles indicated on your dashboard for any announcements. Be aware of any bogus organizations. For official information, please only utilize our official social media accounts.</li>
                            <li>The Growth Addicted Affiliate/Customer Assistance Team will never solicit you for money for any sort of training, promotion, or support once you enroll in the courses. Any paid training or other fees will only be announced on our official account.</li>
                            <li>The company is not responsible for any monetary transactions in any individual's account (even the Company's employee's account) other than official Bank Account of Growth Addicted.</li>
                        </ul>


                        <h4> Affiliate Guidelines and Policies </h4>
                        <hr>

                        <p>Attributes:-</p>



                        <p>The lead is the person who wants to buy or is interested in the goods.</p>



                        <p>Customer/Client: The individual who buys a thing.</p>



                        <p>Sponsor: The individual who recommends the product to you.</p>



                        <p>Affiliate: The one who promotes the product.</p>



                        <h4>Disclaimer: </h4>
                        <hr>
                        <ul>
                            <li> At Growth Addicted, we make every attempt to appropriately portray our goods and services, as well as their potential for revenue and results. Earning, Income, and Results claims provided by our business and its affiliates are estimates of what you could earn. There is no assurance that you will achieve these amounts of income, and you accept the risk that earnings and income statements will change from person to person. As with any business, your results will vary depending on your own work, business experience, expertise, and amount of drive. There are no assurances as to the degree of success you will achieve. The testimonials and examples given are exceptional outcomes that do not apply to the ordinary buyer and are not meant to indicate or guarantee that anybody will attain the same or comparable outcomes. Each person's success is determined by his or her history, devotion, drive, and motivation. There is no guarantee that prior earnings examples will be repeated in the future. We cannot promise your future success or outcomes. There are certain unforeseeable dangers in company and on the Internet that might affect performance. We are not in charge of your behavior. You acknowledge that our firm is not accountable for any success or failure of your business that is directly or indirectly connected to the purchase and use of our information, goods, and services, and that you will utilize our information, products, and services with your own due diligence. We make every effort to clearly express and demonstrate every evidence. Under no circumstances do we send your email or other information you give on our website to any person, corporation, or company.</li>
                            <li> You will not utilize Our company name or variants thereof in your domain names or social media accounts.
                                3) You will be Responsible for the Material of Your Website: You may not advertise Our content or the courses of Our Instructors on a website that contains any sort of libelous, obscene, unlawful, racist, pornographic, or other content considered objectionable by Us.
                            </li>
                            <li>You will be open and honest about Your relationship with Us: Except as expressly permitted by this affiliate Agreement, you may not misrepresent or embellish the relationship between you and Growth Addicted or imply any relationship or affiliation between you and Growth Addicted or any other person or entity. You may not identify yourself as Growth Addicted’s agent or employee, nor may you represent that you have the right to bind Growth Addicted to a contract.</li>
                            <li> Affiliate commissions will be paid per day. We reserve the right to withhold all future payments owing to You if Your account is cancelled due to a breach of these Affiliate Terms.</li>
                            <li> If We deem that paying affiliate commissions to You in any country is prohibited by law, We retain the right not to pay affiliate commissions for any purchases made in such jurisdiction.</li>
                            <li>We may withhold Your final payment for a reasonable period of time to guarantee that You get the proper amount.</li>
                            <li>We may update these Terms from time to time to clarify Our practices or to reflect new or different practices, such as changing the scope of Referral Fees, payment procedures, and Affiliate Program rules, or Referral Specifications or Referral Materials, and Growth Addicted reserves the right to modify and/or make changes to these Affiliate Terms at any time, at Our sole discretion. If We make any significant changes to these Affiliate Terms, You will get an email advising You of the changes and requesting You to agree to Our revised Affiliate Terms. Unless otherwise specified, changes will take effect on the day they are posted.</li>

                        </ul>

                        <h4> Growth Addicted forbids the following activities:</h4>

                        <p>1) Selling Growth Addicted courses at a reduced price by giving cashbacks, discounts, or any other type of offer(s) that the firm has not announced.</p>

                        <p>2) Selling your affiliate account to anybody you choose.</p>

                        <p>3) Display of fictitious/misleading earnings/income evidence by changing your own dashboard or utilizing someone else's dashboard and manipulating it by presenting it in your name and as your own income proof, as well as providing false information with any prospective buyer or lead.</p>

                        <p>4) Speaking with any existing affiliate who is working as a lead/prospective buyer to learn about their conversion or course promotion procedure.</p>

                        <p>5) Abusing or using rude language or tone while engaging with Growth Addicted's education partners, service partners, and personnel.</p>
                        <p>6) Any distortion or misunderstanding of facts or information pertaining to Growth Addicted.</p>

                        <p>7) Promoting any other Affiliate program/MLM to Growth Addicted Affiliates/Customers.</p>

                        <p>*The company will not be liable for, entertain, or attempt to mediate any sorts of personal issues (such as money exchanges, disagreements on any subject whatsoever, etc.) between leads, affiliates, or affiliates with their leads.</p>

                        <h4> NOTE: </h4>
                        <hr>
                        <p>In the event of a breach of any of these principles, the rights to affiliate the Growth Addicted courses may be temporarily or permanently revoked. After suspension or termination, the Affiliate can still access the courses but cannot promote them or earn commission on their sales.

                        <p> We really appreciate your cooperation.</p>

                        <h4> Legal Framework </h4>
                        <hr>
                        <p>These Terms will be regulated and construed in accordance with the laws of Delhi, which shall govern the agreement without regard to its conflict of law rules.

                        <p>Our failure to enforce any of these Terms' rights or provisions will not be construed as a waiver of such rights. If a court rules that any term of these Terms is unlawful or unenforceable, the remaining sections of these Terms shall continue in effect. These Terms comprise our whole agreement with respect to our Service and supersede and replace any earlier agreements we may have had with respect to Service.</p>

                        <h4>Service Modifications </h4>
                        <hr>

                        <p>We retain the right, at our sole discretion, to discontinue or alter our Service, as well as any service or material provided via the Service, without notice. We shall not be liable if all or any part of the Service is unavailable at any time or for any amount of time for any reason. We reserve the right to restrict access to certain parts of the Service, or the entire Service, to users, including registered users, at any time.</p>

                        <h4>Modifications to Terms </h4>

                        <p>We reserve the right to change the Terms at any time by posting the updated terms on this website. It is your duty to examine these Terms on a regular basis.</p>

                        <p>Your continued use of the Platform after the amended Terms are posted indicates that you accept and consent to the changes. You must visit this page regularly to be informed of any changes, since they are legally binding on you.</p>

                        <p>You agree to be bound by the amended terms if you continue to access or use our Service after such adjustments become effective. You are no longer permitted to use the Service if you do not agree to the revised conditions.</p>

                        <h4>Severability And Waiver </h4>
                        <hr>

                        <p>Company's waiver of any term or condition set forth in Terms shall not be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition, and Company's failure to assert a right or provision under Terms shall not be deemed a waiver of such right or provision.</p>

                        <p>If a court or other tribunal of competent jurisdiction rules that any term of these Terms is invalid, unlawful, or unenforceable for any reason, that provision will be removed or restricted to the bare minimum such that the remaining sections of these Terms will remain in full force and effect.</p>

                        <h4>Acknowledgement </h4>
                        <hr>

                        <p> YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM BY USING SERVICE OR OTHER SERVICES PROVIDED BY US.</p>


                        <p>Only Indian nationals with legitimate documentation, such as an Aadhar card, can operate as "Affiliate Marketers." Indian bank account are required. </p>



                        <h4>Please Contact Us </h4>
                        <hr>
                        Please submit your thoughts, comments, and technical assistance requests to <strong>care@growthaddicted.com</strong>.


                    </div>
                </div>
            </div>

        </div>
    </div>





    @endsection