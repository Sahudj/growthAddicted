
@extends('layouts.frontend.index')

@section('content')

 <div class="wc-banner-wrapper" style="overflow-x:hidden; padding: 175px 0px 18px !important;">
           
 </div>
 <div class="wc-main-courses" style="overflow-x:hidden">
        <div class="wc-courses-wrapper">
            <div class="container">

                @if($status == 'PAYMENT_SUCCESS')
                 <div class="alert  {{($status == 'PAYMENT_SUCCESS') ? 'alert-success' : 'alert-danger' }} alert-success">Thanks for purchasing this package. </div>
                @else
                 <div class="alert  {{($status == 'PAYMENT_SUCCESS') ? 'alert-success' : 'alert-danger' }} alert-success">Your order has been cancelled. </div>
                @endif 
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="wc-courses-heading aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
                             @if($status == 'PAYMENT_SUCCESS')
                            <div class="text-right">
                                <a style="float: right;" title="Dashbaord" class="btn btn-success" href="{{url('user/courses')}}">Go To Dashboard</a>
                            </div>
                            @endif
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{$getOrderDetails->customerName}}</td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>{{$getOrderDetails->customerEmail}}</td>
                                    </tr>


                                    <tr>
                                        <td>Mobile No</td>
                                        <td>{{$getOrderDetails->customerPhone}}</td>
                                    </tr>

                                   <tr>
                                        <td>Package Name</td>
                                        <td>{{ !empty($getOrderDetails->name) ? $getOrderDetails->name : "" }}</td>
                                    </tr>

                                    <tr>
                                        <td>Amount</td>
                                        <td>{{$getOrderDetails->amount}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Order Id</td>
                                        <td>{{$getOrderDetails->id}}</td>
                                    </tr>

                                    <tr>
                                        <td>ReferenceId</td>
                                        <td>{{$getOrderDetails->referenceId}}</td>
                                    </tr>


                                    <tr>
                                        <td>Payment Mode</td>
                                        <td>{{$getOrderDetails->paymentMode}}</td>
                                    </tr>

                                    <tr>
                                        <td>Referral By</td>
                                        <td>{{ !empty($getOrderDetails->username) ? $getOrderDetails->username : "" }}</td>
                                    </tr>  

                                    <tr>
                                        <td>Payment Status</td>
                                        <td>{{$status}}</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
     

@endsection   




   