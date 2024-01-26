<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Order Invoice</title>
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

	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body style="font-family: Verdana, Geneva, sans-serif;box-shadow: 4px 4px 6px #c0c0c0, 0 -1px 6px #c0c0c0;border-radius:10px;margin:10px 10%; border: 1px solid rgb(239, 239, 254); background-color: rgb(237, 237, 237);">
<div>
   		<div style="border-radius:10px;background-color: #fff;margin: 20px 40px 5px 40px;padding: 15px 35px;" class="whiteboxContainer" >
				
			<div style="border-top-left-radius:10px;border-top-right-radius:10px;font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #fff
			;font-family: sans-serif;background-color:#800080;padding:1px; "  align="center" id="emb-email-header">
			<h4 style="font-weight: 200;">Thanks for shopping with us</h4>
		</div>
			<div style="padding: 35px;">
				
					<p>Hi, <strong>{{ucfirst($dataArr['customer_name'])}}</strong></p>
					<p>We have received your <span style="background: orange;">order</span>,
					<p>You can access to your account.
					<p>Have a great experience with Growth Addicted.</p>

				<?php 

					$addonHtml = '<div class="addOnProduct" style="font-size:12px; margin-bottom:20px; margin-left:33px; line-hight:2">';

	        foreach ($dataArr['addOn'] as $row) {
	            $addonHtml.= '<small>'. $row->sub_folder_name.' x 1'.'</small>'.'<br>';
	        }

	        $addonHtml.= '</div>';

					?>
					
					<p> <strong>[<span style="background: orange;">Order</span> <span style="color:#800080"> #{{$dataArr['orderId']}}] on date ({{(date('d-m-Y'))}}) </span> </p>

					<table width="100%">
						<tr>
							<td>Product</td>
							<td>Quantity</td>
							<td>Price</td>
						</tr>

						<tr>
							<td> <strong>{{($dataArr['package'])}}     x 1</strong>

								  <br>
                        {!! $addonHtml !!} 
							 </td>
							<td> <strong>1</strong> </td>
							<td> <strong><img src="{{url('public/rupees.png')}}" width="13px"> {{($dataArr['amount'])}}</strong> </td>
						</tr>

						<tr>
							<th colspan="2">SubTotal : </th>
							<td><img src="{{url('public/rupees.png')}}" width="13px"> {{$dataArr['amount']}}</td>
						</tr>

						<tr>
							<th colspan="2">Payment Method : </th>
							<td>{{$dataArr['paymentMode']}}</td>
						</tr>

						<tr>
							<th colspan="2">Total : </th>
							<td><img src="{{url('public/rupees.png')}}" width="13px"> {{($dataArr['amount'])}}</td>
						</tr>
					</table>
			
						<h4 style="color:#800080">Billing Address</h4>
						<div style="border: solid 2px #dcdcdc; padding: 10px;">
							<p>{{ucfirst($dataArr['customer_name'])}}</p>
							<p>{{ucfirst($dataArr['mobile_no'])}}</p>
							<p>{{ucfirst($dataArr['email'])}}</p>
						</div>

			</div>
		
			</div>
		</div>
	</body>
</html>
