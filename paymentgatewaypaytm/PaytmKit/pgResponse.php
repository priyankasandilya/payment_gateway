<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include('../../connection.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	// if () {
	// 	echo "<b>Transaction status is success</b>" . "<br/>";
	// 	//Process your transaction here as success transaction.
	// 	//Verify amount & order id received from Payment gateway with your application's order id and amount.
	// }
	// else {
	// 	echo "<b>Transaction status is failure</b>" . "<br/>";
	// }

	if (isset($_POST) && count($_POST)>0 )
	{ 
		$merchantid=$_POST['MID'];

		$orderid=$_POST['ORDERID'];
		// echo $custid=$_POST['CUSTID'];
		$transid=$_POST['TXNID'];
		$transamt=$_POST['TXNAMOUNT'];
		$paymtmode=$_POST['PAYMENTMODE'];
		$currency=$_POST['CURRENCY'];
		$transdate=$_POST['TXNDATE'];
		$transstatus=$_POST['STATUS'];
		$checksumhash=$_POST['CHECKSUMHASH'];
		$respcode=$_POST['RESPCODE'];
		$respmsg=$_POST['RESPMSG'];
		$pymtgtwyname=$_POST['GATEWAYNAME'];
		$banktransid=$_POST['BANKTXNID'];
		$bankname=$_POST['BANKNAME'];

		$query = mysqli_query($con,"select `orderid` from `payment_gateway_paytm` where `orderid` = '$orderid'");
		$fetdata = mysqli_fetch_assoc($query);
		$fetorderid = $fetdata['orderid'];
		if($fetorderid == $orderid){
			$sql=mysqli_query($con,"update `payment_gateway_paytm` set `merchantid`='$merchantid',`transactionid`='$transid',`transactionamount`='$transamt',`paymentmode`='$paymtmode',`currency`='$currency',`transdate`='$transdate',`transstatus`='$transstatus',`responsecode`='$respcode',`responsemessage`='$respmsg',`gatewayname`='$pymtgtwyname',`banktransid`='$banktransid',`bankname`='$bankname',`checksumhash`='$checksumhash' where `orderid` = '$orderid'");
			if($_POST["STATUS"] == "TXN_SUCCESS"){
				echo '<script>alert("Transaction status is success");location.replace("../../admin/payment_gateway_paytm.php");</script>';
			}
			else {
			echo '<script>alert("Transaction status is Failure");location.replace("../../admin/payment_gateway_paytm.php");</script>';
			}
}
		// $sql=mysqli_query($con,"INSERT INTO `payment_gateway_paytm`(`orderid`,`merchantid`,`transactionid`,`transactionamount`,`paymentmode`,`currency`,`transdate`,`transstatus`,`responsecode`,`responsemessage`,`gatewayname`,`banktransid`,`bankname`,`checksumhash`) VALUES('$orderid','$merchantid','$transid','$transamt','$paymtmode','$currency','$transdate','$transstatus','$respcode','$respmsg','$pymtgtwyname','$banktransid','$bankname','$checksumhash')");
		// echo 'hi';
		// $ad = mysqli_query($con,$sql);
		// if($sql>0){
		// 	echo '<script>alert("Transaction status is success");location.replace("../../admin/payment_gateway_paytm.php");</script>';
		// }
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.`customerid`,'',
}

?>