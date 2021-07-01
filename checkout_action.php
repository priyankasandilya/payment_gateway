<?php
session_start();
 include('admin/connection.php');

date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");

$user_id = $_SESSION['id'];

if(isset($_POST['place_pay'])){

$name = $_POST['first_name'];
$phone_no = $_POST['phone_number'];
$delivery_email = $_POST['email_address'];
$saddress = $_POST['address'];
$country=$_POST['country'];
 $city = $_POST['city'];
 $state = $_POST['state'];
 $zip_code = $_POST['zip_code'];
 
if(!empty($_POST['cart_id'])) {
$chk11="";
$chk21="";
foreach($_POST['cart_id'] as $chk11)  
  {  
      $chk21 .= $chk11.",";  
  }
}else{
    $chk21 = "";
    
}
 $subtotal = $_POST['subtotal'];
 $rent_amount = $_POST['rent_amount'];
 $final_price = $_POST['final_price'];
 $grand_total = $_POST['grand_total'];
 $payment_type=$_POST['payment_type'];

$sql1="INSERT INTO `order_master`(`user_id`,`cart_ids`, `name`,`email`, `phone`, `address`, `city`, `state`, `pincode`, `subtotal`, `total_rent`, `Grand_total`, `payment_type`, `payment_status`, `payment_id`, `created_date`) VALUES ('$user_id',$chk21','$name','$delivery_email','$phone_no','$saddress','$city','$state','$zip_code','$subtotal','$delivery_pickup','$sgst','$cgst','$rent_amount','$grand_total','$payment_type','pending','','$date')";
 	$results = mysqli_query($con,$sql1);

 $insert_id=mysqli_insert_id($con);

$sql3= "UPDATE `tbl_cart` SET `cart_status`=2 WHERE `user_id`='".$user_id."'";
$results=mysqli_query($con,$sql3);
if($results)
{
	echo "<script>alert(' Thank You For your Order, Order No.:$insert_id'); window.location='index.php';</script>;";

}
else{
	echo "<script>alert('Order Faild'); window.location='index.php';</script>;";

}
}
?>