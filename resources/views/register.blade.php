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
    <div class="register-page">
        <div class="register-page-wrap">
            <div class="left_content">
                
            </div>

             
            <div class="right_form sign_right_form" style="max-width: 700px !important;">


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