<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Upgrade Package Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
	@media (max-width: 500px) {
		div {
			font-size: 8px !important;
		}
		img{
			max-width:50px !important;
			max-height:50px !important;
		}
		.whiteboxContainer {
			margin: 10px 20px 5px 20px !important;
		}
	}

	</style>

</head>
<body style="font-family: Verdana, Geneva, sans-serif;box-shadow: 4px 4px 6px #c0c0c0, 0 -1px 6px #c0c0c0;border-radius:10px;margin:10px 10%; border: 1px solid rgb(239, 239, 254); background-color: rgb(237, 237, 237);">
<div>
   
	   <div style="border-top-left-radius:10px;border-top-right-radius:10px;font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e
		;font-family: sans-serif;background-color:#2A3241;padding:0px; border-bottom:10px solid #00F46D;"  align="center" id="emb-email-header">
			<img style="padding:0px;border:3px solid border: 0;-ms-interpolation-mode
		: bicubic;display: block; max-width: 200px;" src="{{url('/public/Final Logo.png')}}" alt="" >
		</div>

			<div style="border-radius:10px;background-color: #fff;margin: 20px 40px 5px 40px;padding: 15px 35px;" class="whiteboxContainer" >
			@if( isset($dataArr['customer_name']) && !empty($dataArr['customer_name']))	
			<p>Hello Dear <strong>{{ucfirst($dataArr['name'])}} </strong> congratulations <strong>{{ucfirst($dataArr['customer_name'])}} </strong> just upgrade his package to <strong> {{$dataArr['packageName']}} </strong> 
			and you will get your commission <strong> ₹{{$dataArr['amount']}} </strong>.</p>
			@else
			<p>Welcome to the Growth addicted <strong>{{ucfirst($dataArr['name'])}}</strong></p>
			<p>Thanks for upgrade you package.</p>
			<p>Your package <strong> {{$dataArr['packageName']}} </strong>  has been activated .</p>	
			@endif
			 	<p>We believe that that you want to improve your skills Growth Addicted is here to help you.
			 	</p>
				<p>We hope you enjoy using it – we’d love to hear what you think.</p>
				<p>Join the Community! Follow our socials and come see us at <a href="https://growthaddicted.com">www.growthaddicted.com</a> .</p>

				<p>Don’t want our emails? <a href="#">Unsubscribe</a> </p>
				
				Thanks,<br>
				<strong>Growth Addicted Team</strong>
			</div>
		</div>
	</body>
</html>
