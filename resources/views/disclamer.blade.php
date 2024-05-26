@extends('layouts.frontend.index')

@section('content')

<style>
    .disclamer{
        width: 100%;

    }
    .disclamer .disclamer-wrap{
        width: 100%;
        padding: 300px 30px;

    }
    .disclamer .disclamer-wrap h1,
    h2 {
        color: #2c3e50;
    }

    .disclamer .disclamer-wrap h1 {
        font-size: 2em;
        margin-bottom: 0.5em;
    }

    .disclamer .disclamer-wrap h2 {
        font-size: 1.5em;
        margin-top: 1.5em;
        margin-bottom: 0.5em;
    }

    .disclamer .disclamer-wrap p {
        margin: 0.5em 0;
    }
</style>

<div class="disclamer">
    <div class="disclamer-wrap">
        <h1>Disclaimer</h1>
        <p>The information provided by Growth Addicted (“Company,” “we,” “our,” “us”) on growthaddicted.com (the “Site”) is for general informational purposes only. All information on the Site is provided with complete good faith; however, we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the site.</p>

        <p>UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>

        <h2>External Links Disclaimer</h2>
        <p>The site may contain (or you may be directed to another site) links to other websites or content belonging to or originating from third parties or links to websites and features. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability, or completeness by Growth Addicted.</p>

        <p>WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY INFORMATION OFFERED BY THIRD-PARTY WEBSITES LINKED THROUGH THE SITE OR ANY WEBSITE OR FEATURE LINKED IN ANY BANNER OR OTHER ADVERTISING. WE WILL NOT BE A PARTY TO OR IN ANY WAY RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES.</p>

        <h2>Professional Disclaimer</h2>
        <p>The Site can not and does not contain financial advice. The information is provided for general informational and educational purposes and is not a substitute for professional financial advice. Accordingly, we encourage you to consult with the appropriate professionals before taking any action based on such information. We do not provide any kind of financial advice.</p>

        <p>Content published on growthaddicted.com is intended to be used and must be used for informational purposes only. It is imperative to do your analysis before making any decision based on your own personal circumstances. You should take independent financial advice from a professional or independently research and verify any information you find on our website and wish to rely upon.</p>

        <p>THE USE OR RELIANCE OF ANY INFORMATION CONTAINED ON THIS SITE IS SOLELY AT YOUR OWN RISK.</p>

        <h2>Affiliates Disclaimer</h2>
        <p>The Site may contain links to affiliate websites, and we may receive an affiliate commission for any purchases or actions made by you on the affiliate websites using such links.</p>

        <h2>Payment Disclaimer</h2>
        <p>Growth Addicted does not authorize any person to collect payment against our products in cash or personal bank/ PayPal/ Paytm account and is also not responsible for any payment made against our products to anyone in any mode other than our website or through an affiliate link which takes you through our website.</p>

        <p>If you are unable to make the payment or are facing any payment-related issues, you can WhatsApp us on 89624 79929; Our payment support team is available 10:30 AM to 6:00 PM (Mon-Sun).</p>

        <h2>Purchase Disclaimer</h2>
        <p>The amount that a customer pays at the Growth Addicted website growthaddicted.com is only for the online courses provided in the product purchased by the customer.</p>

        <p>No amount is paid by the customer to become an affiliate with Growth Addicted.</p>

        <p>The option to become an affiliate with Growth Addicted is free of cost and optional with the purchase of any product (desired by the customer) through the affiliate link of the person who referred them to the Growth Addicted website growthaddicted.com.</p>

        <p>The purchase made by the customer directly from the Growth Addicted website growthaddicted.com or through the affiliate link of the person who referred him to the Growth Addicted website growthaddicted.com for his/her desired product (s) does not guarantee any commission or financial returns whatsoever.</p>

        <h2>Testimonials Disclaimer</h2>
        <p>The site may contain testimonials by users of our products and/or services. These testimonials reflect the real-life experiences and opinions of such users. However, the experiences are personal to those users and may not necessarily represent all users of our products and/or services. We don’t tend to create any misunderstandings that everyone might or might not have the same sort of experience from our platform.</p>

        <p>YOUR INDIVIDUAL RESULTS MAY VARY.</p>

        <p>The testimonials on the site are submitted in various forms such as text, audio, and/or video and are reviewed by us before being posted. They appear on the site verbatim as given by the users, except for the correction of grammar or typo. Some testimonials may have been shortened for the sake of brevity, where the full testimonial contained extraneous information not relevant to the general public.</p>

        <p>The views and opinions contained in the testimonials belong solely to the individual user and do not reflect our views and opinions.</p>

        <p>Here at Growth Addicted, we make every effort possible to make sure that we accurately represent our products and services and their potential for income and results.</p>

        <p>Earning, income, and result statements made by our firm and its affiliates are estimates of what we think you can possibly earn. There is no guarantee that you will make these income levels, and accept the risk that the earnings and income statements differ by individuals. As with any business, your result may vary and will be based on your individual effort, business experience, expertise, and level of desire. There are no guarantees concerning the level of success you may experience.</p>

        <p>The testimonials and examples used are exceptional results, which do not apply to the average purchaser and are not intended to represent or guarantee that anyone will achieve the same or similar results. Each individual’s success depends on his/her background, dedication, desire, and motivation. There is no assurance that the examples of past earnings can be duplicated in the future. We cannot guarantee your future results and/or success. There are some unknown risks in businesses and on the Internet that we cannot foresee, reducing results. We are not responsible for your actions. The use of our information, products, and services should be based on your own due diligence, and you agree that our company is not liable for any success or failure of your business that is directly or indirectly related to the purchase and use of our information, products, and services. We make every attempt to clearly state and show all proof. We do not send your email or any information shared by you on our website to any person, firm, or company under any circumstances.</p>

        <h2>Errors and Omissions Disclaimer</h2>
        <p>While we have made every attempt to ensure that the information contained in this site has been obtained from reliable sources, Growth Addicted is not responsible for any errors or omissions or for the results obtained from the use of this information. All information on this site is provided “as is,” with no guarantee of completeness, accuracy, timeliness, or of the results obtained from the use of this information, and without warranty of any kind, express or implied, including but not limited to warranties of performance, merchantability, and fitness for a particular purpose.</p>

        <p>In no event will Growth Addicted, its related partnerships or corporations, or the partners, agents, or employees thereof be liable to you or anyone else for any decision made or action taken in reliance on the information in this Site or for any consequential, special or similar damages, even if advised of the possibility of such damages.</p>

        <h2>Guest Contributors Disclaimer</h2>
        <p>This Site may include content from guest contributors, and any views or opinions expressed in such posts are personal and do not represent those of Growth Addicted or any of its staff or affiliates unless explicitly stated.</p>

        <h2>Logos and Trademarks Disclaimer</h2>
        <p>All logos and trademarks of third parties referenced on Growth Addicted are the trademarks and logos of their respective owners. Any inclusion of such trademarks or logos does not imply or constitute any approval, endorsement, or sponsorship of Growth Addicted by such owners.</p>

        <h2>Contact Us</h2>
        <p>Should you have any feedback, comments, requests for technical support, or other inquiries, please contact us through our email: <a href="mailto:care@growthaddicted.com">care@growthaddicted.com</a></p>

    </div>
</div>





@endsection