@extends('layouts.frontend.index')

@section('content')
<style>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }
        .refunds-policy-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .refunds-policy-heading h4 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .refunds-policy-heading hr {
            border: 0;
            height: 2px;
            background: #000;
            margin: 20px 0;
        }
        .refunds-policy-container p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .refunds-policy-container strong {
            color: #d9534f;
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
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="refunds-policy-container aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
        <div class="refunds-policy-heading">
            <h4>Refunds Policy</h4>
            <hr>
        </div>
        <p>We provide refunds for orders placed within 2 hours of the packages being purchased.</p>
        <p>A payment gateway charge of 2% of the amount paid and a processing fee of 5% of the amount paid will be deducted from the amount to be reimbursed.</p>
        <p>Under any circumstances, no refund will be offered to the client for the purchase of any package made directly from the Growth Addicted website "www.growthaddicted.com" or through the affiliate link of the person who directed him to the Growth Addicted website after 2 hours of the transaction.</p>
        <p>To request a refund, please send an email to <a href="mailto:care@growthaddicted.com">care@growthaddicted.com</a>. Only use the following format with your registered e-mail ID.</p>
        <p>Full Name - </p>
        <p>Registered email address -</p>
        <p>Date of registration -</p>
        <p>Screenshot of Payment Invoice with Date and Time (You should have gotten this through email/message when you paid) -</p>
        <p>The reason for the refund -</p>
        <p><strong>*Without the above-mentioned information, no refund request will be considered.</strong></p>
        <p>Please keep in mind that for the "Refund," you must contact us solely at <a href="mailto:care@growthaddicted.com">care@growthaddicted.com</a>.</p>
    </div>
                </div>
            </div>

        </div>
    </div>





    @endsection