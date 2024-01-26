@extends('layouts.login.register')

@section('content')
<style type="text/css">
    .d-none{
        display: none;
    }
    @media(max-width:375px){
    .checkbox.signin-checkbox span.remember a {
        margin-left: 30px !important;
        }
    }

    label#selectId7 {
    background: #ff2850 !important;
}
</style>
    <div class="login_main_wrapper signin_wrapper">
        <div class="login_inner_box">
            <div class="left_content">
                <div class="left_img" style="padding: 110px 68px !important;">
                    <!-- <img src="assets/images/Image.png" alt=""> -->
                    <!-- <img src="assets/images/left-img-003.png" alt="left-img"> -->
                    <img src="{{url('public/frontend/login')}}/assets/images/New-signup.png">
                </div>
            </div>

             
            <div class="right_form sign_right_form" style="max-width: 700px !important;">
                <div class="right_inner">
                    <div class="top_heading">
                        <img src="{{url('public/frontend/login')}}/assets/images/footer-logo.png" alt="logo-img" >
                        <h1>Enroll to
                            <span>Growth Addicted</span>
                        </h1>
                    </div>

                       @if(Session::has('successMessage'))
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Alert </strong> {!!Session::get('successMessage')!!}
                        </div>
                        @endif

                        @if(Session::has('errorMessage'))
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Alert </strong> {!!Session::get('errorMessage')!!}
                        </div>
                        @endif
                   <form role="form" action="{{url('order')}}" method="post">
                    {!! csrf_field() !!}
                            <div class="input-field signin-input">
                                <label>Full Name</label>
                               <input type="text" class="form-control" name="name" placeholder="Enter Name"  value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    @endif
                                <span><i class="fa fa-user-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="input-field signin-input">
                                <label>Enter Email Id</label>
                              <input type="email" class="form-control" name="email" placeholder="Enter Email"  value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            </div>
                        <div class="signform_inline">
                        <div class="input-field signin-input">
                            <label>Enter Mobile Number</label>

                             <input type="tel" class="form-control" id="phone" name="mobile_no" placeholder="Enter Mobile No"  value="{{ old('mobile_no') }}" placeholder="123-456-789">
                                    @if ($errors->has('mobile_no'))
                                        <span style="color: red;">{{ $errors->first('mobile_no') }}</span>
                                    @endif
                            <span class="te-number">+91</span>
                            <span><i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="input-field signin-input">
                            <label>Password</label>
                             <input type="password" id="password" class="form-control" name="password" placeholder="Password"  value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                            <span><i toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" aria-hidden="true"></i></span>
                        </div>
                    </div>
                            <div class="signform-select"> 
                            <div class="input-field signin-input">
                                <label>select state</label>
                                <select class="form-control" name="state">
                                    <option value="">Please select</option>
                                      @foreach($states as $row)
                                      <option value="{{$row->id}}">{{$row->state}}</option>
                                      @endforeach          
                                </select>
                                @if ($errors->has('state'))
                                    <span style="color: red;">{{ $errors->first('state') }}</span>
                                @endif
                            </div>
                            <div class="input-field signin-input">
                                <label>Enter Coupon Code</label>
                                 <input type="text" name="referral_code" id="referralCode" class="form-control" placeholder="Enter Coupon Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button class="btn btn-apply" id="applyButton" type="button">Apply Coupon</button>
                                <button class="btn btn-apply d-none" id="cancelButton" type="button">Cancel Coupon</button>
                                 <p class="d-none" id="referenceBy" style="color:green"></p>
                                 <input type="hidden" name="referralPerson" id="referralPerson" value="">
                            </div>
                        </div>
                      <!--   <div class="input-field signin-input">
                            <label>Payment Method</label>
                            <input type="textarea" class="textarea" id="textarea" value="Cash-Free" placeholder="enter pagment method" rows="4" cols="50">
                        </div> -->
                        <div class="input-field signin-input signin-radio">
                            <label>Choose Your favourite package</label>

                            <div class="radio-container-img radio1">
                            @foreach($packages as $row)
                                <label for="radio" class="form-radio-img" id="selectId{{$row->id}}" onclick="selcetPackage({{$row->id}})">
                                    <img src="{{url('public/packages/'.$row->image)}}" alt="">
                                    <input type="radio" name="package" id="packageId{{$row->id}}" value="{{$row->id}}" {{($row->id == $lastPackageId) ? "checked" : ""}}>
                                    <p>{{$row->name}}</p>
                                    <div class="{{($row->id == 2) ? 'sign-radio-price alpha' : (($row->id == 3) ? 'sign-radio-price alpha2' : 'sign-radio-price alpha3') }}" id="sign-price">
                                        @if( isset($_GET['eid']) && !empty($_GET['eid']))
                                        <p class="price" id="affPrice{{$row->id}}"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->affiliate_price}}</span></p>
                                        
                                        <p class="affPrice2 d-none" id="affPrice{{$row->id}}"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>

                                        @else
                                        <p class="price" id="price{{$row->id}}"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->amount}}</span></p>
                                        @endif
                                        <p class="affPrice d-none" id="affPrice{{$row->id}}"><del>₹{{$row->market_price}}</del> - <span>₹{{$row->affiliate_price}}</span></p>
                                    </div>
                                    @if($row->package_status == 1)
                                     <span class="bestprice">Best Package</span>
                                    @endif 
                                </label>
                            
                                @endforeach
                            </div>
                        </div>
                        </div>
                        <div class="input-field cash_acc_field">
                            <label>cashfree-account</label>
                            <input type="name" class="name" id="name" placeholder="cash-free account">
                            <span><i class="fa fa-user-o" aria-hidden="true"></i></span>
                        </div>
                        <div class="input-field checkout" id="checkout"></div>
                        <div class="upper-para">
                            <p>Your personal data will be used to process your order, support your experience throughout this website and for other purposes descried in our <a style="color:#c41c98; font-size: 15px; text-decoration: none;" href="{{url('privacy-policy')}}">Privacy policy</a></p>
                        </div>
                        <div class="checkbox signin-checkbox">
                            <label>
                                <input type="checkbox" name="terms_accept" value="1" required>
                                <span class="checkmark"></span>
                                <span class="remember">I have read and agree to the website <a href="{{url('terms-conditions')}}">terms and
                                        conditions</a></span>
                            </label>
                        </div>

                         <div class="checkbox signin-checkbox">
                            <label>
                                <input type="checkbox" name="terms_accept_2" value="1" required>
                                <span class="checkmark"></span>
                                <span class="remember">I agree that the amount I am paying is only for training courses</span>
                            </label>
                        </div>

                        <div class="login signin-btn">
                            <button type="submit" class="btn">signup</button>
                             <input type="hidden" name="_token_data" id="_token_data">
                            <!-- <button type="button" class="btn">login</button> -->
                            <p class="login-p">Already Have An Account? <a href="{{route('login')}}">Log-In</a></p>
                        </div>
                    </form>
                    <input type="hidden" name="curPackage" id="curPackage" value="">
                </div>

            </div>
        </div>
    </div>

    <?php

    function encryptor($action, $string) {
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
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    } 
                       
    ?>

    <script>
    $(document).ready(function(){
        var packageId = "{{ isset($_GET['pid']) ? $_GET['pid'] : "" }}";
        if(packageId == '' ){
            //var packageId = $('#packageId4').val();
            var packageId = '{{$lastPackageId}}';
            checkout(packageId, 1);  
        }

        var guest = "{{ isset($_GET['guest']) ? encryptor('decrypt',$_GET['guest']) : "" }}";
        if(guest){
            $('#packageId'+guest).trigger('click');
            if(guest == 2){
                $("input[name=package][value="+guest+"]").prop("checked",true);    
                $('#selectId3').hide();
                $('#selectId4').hide();
            }
            if(guest == 3){
                $("input[name=package][value="+guest+"]").prop("checked",true);
                $('#selectId2').hide();
                $('#selectId4').hide();
            }
            if(guest == 4){
                $("input[name=package][value="+guest+"]").prop("checked",true);
                $('#selectId2').hide();
                $('#selectId3').hide();
            }
}

        var userId = "{{ isset($_GET['eid']) ? $_GET['eid'] : "" }}";
        if(packageId && userId){
            getDetails(packageId, userId);
        } 
    })

    $("#cancelButton").click(function(){
        $("#referralCode").val('');
        $("#applyButton").show();
        $("#cancelButton").addClass('d-none');
        $("#referenceBy").addClass('d-none');
        $("#referralPerson").val('0');
        var userId = "{{ isset($_GET['eid']) ? $_GET['eid'] : "" }}";
        //$("#referralCode").prop('disabled', false);
            $(".sign-radio-price").each(function () {
                if(userId){
                    var priceParagraph = $(this).find(".price");
                    var affiPrice = $(this).find(".affPrice2");
                    priceParagraph.addClass("d-none");
                    affiPrice.removeClass("d-none");
                }else{
                    var priceParagraph = $(this).find(".price");
                    var affiPrice = $(this).find(".affPrice");
                    priceParagraph.removeClass("d-none");
                    affiPrice.addClass("d-none");
                }
            });

        const packageId = document.getElementById('curPackage').value;
        checkout(packageId, 0);
    });


    $("#applyButton").click(function(){
        var code = $("#referralCode").val();
        if(code == ''){
            alert("Enter code");
            return false;
        }
        var signPriceElements = $('.sign-radio-price');
        signPriceElements.each(function() {
            var priceParagraph = $(this).find('.price');
            priceParagraph.addClass('d-none');
            $(this).find('.affPrice').removeClass('d-none');
        });
        checkRefCode(code);
    });


function selcetPackage(packageId){
    checkout(packageId, 1);    
}

    function checkout(packageId, type){
        var refId = $("#referralPerson").val();
        document.getElementById('curPackage').value = packageId;
        $.ajax({
            url: '{{url("/checkout")}}',
            type:'post',
            data: {"_token": "{{ csrf_token() }}", 'packageId' : packageId, 'type' : type, 'refId' : refId },
            success: function(data){
               $("#checkout").html(data);
               
            }
        });
        
        return false;
    }


  
    function getDetails(packageId, userId){
        
        $.ajax({
            url: '{{url("/get-package-data")}}',
            type:'post',
            data: {"_token": "{{ csrf_token() }}", 'packageId' : packageId, "user_id" : userId},
            success: function(data){
                var res = JSON.parse(data);
                if(res.status == "success"){
                    $("#referralCode").val(res.referral_code);
                    $("#referralCode").prop('disabled', true);
                    $("#applyButton").hide();
                    $("#_token_data").val(res.refId);
                    $("#cancelButton").removeClass('d-none');
                    $("#referenceBy").removeClass('d-none');
                    $("#referenceBy").html('<strong>COUPON CODE APPLIED </strong> <br> Name : '+res.name);
                    $("#referralPerson").val(res.refId);
                    setTimeout(function(){
                        checkout(packageId, 0);
                    }, 2000)
                    if(res.packageId == 2){
                        $('#selectId3').hide();
                        $('#selectId4').hide();
                    }
                    if(res.packageId == 3){
                        $('#selectId2').hide();
                        $('#selectId4').hide();
                    }
                    if(res.packageId == 4){
                        $('#selectId2').hide();
                        $('#selectId3').hide();
                    }

                    if(res.packageId == 7){
                        $('#selectId2').hide();
                        $('#selectId3').hide();
                        $('#selectId4').hide();
                    }

                    $("input[name=package][value="+res.packageId+"]").prop("checked",true);    
                    //$('#packages option[value='+res.packageId+']').prop("selected", true);
                }
            }
        });
        
        return false;
    }


    function checkRefCode(code){
        const packageId = document.getElementById('curPackage').value;        
        $.ajax({
            url: '{{url("/check-ref-code")}}',
            type:'post',
            data: {"_token": "{{ csrf_token() }}", 'code' : code},
            success: function(data){
                var res = JSON.parse(data);
                if(res.status == "success"){
                    $("#referralCode").val(res.referral_code);
                    $("#referralCode").prop('disabled', true);
                    $("#applyButton").hide();
                    $("#_token_data").val(res.refId);
                    $("#cancelButton").removeClass('d-none');
                    $("#referenceBy").removeClass('d-none');
                    $("#referenceBy").html('<strong>COUPON CODE APPLIED </strong> <br> Name : '+res.name);
                    $("#referralPerson").val(res.refId);
                    checkout(packageId, 1);
                }else if(res.status == "error"){
                    $("#referenceBy").removeClass('d-none').css({'color':'red'});
                    $("#referenceBy").html("Invalid code please check ");
                }
            }
        });
        
        return false;
    }
</script>
   


<script>

$(document).on('click', '.toggle-password', function() {

$(this).toggleClass("fa-eye fa-eye-slash");

var input = $("#password");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});

</script>
  @endsection