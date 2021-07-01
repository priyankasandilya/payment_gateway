<?php
require('config.php');
include('connection.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);
	$token=$_POST['stripeToken'];
	$data=\stripe\charge::create(array(
		"amount"=>500,
		"currency"=>"inr",
		"description"=>"payment gateway by pari for testing with stripe",
		"source"=>$token,
	));
	// echo '<script>alert("Payment Done Successfully");location.replace("payment_gateway.php");</script>';
	// echo "<pre>";
	// print_r($data);

	$transid = $data->id;
	$amount = $data->amount;
	$currency = $data->currency;
	$source = $data->source->id;


	$sql="INSERT INTO `payment_gateway_paytm`(`orderid`,`merchantid`,`transactionid`,`transactionamount`,`paymentmode`,`currency`,`transdate`,`transstatus`,`responsecode`,`responsemessage`,`gatewayname`,`banktransid`,`bankname`,`checksumhash`) VALUES('','$source','$transid','$amount','','$currency','','','','','','','','')";
	$ad = mysqli_query($con,$sql);
	echo '<script>alert("Transaction status is success");location.replace("payment_gateway.php");</script>';
	
}

// echo '<pre';
// print_r($_POST);
?>