<?php
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
$customer_id=$_SESSION['id'];
if(isset($_POST['update_order']))
{
$order_id=mysqli_real_escape_string($con,$_POST['order_id']);
$status=mysqli_real_escape_string($con,$_POST['status']);
$edd=mysqli_real_escape_string($con,$_POST['edd']);

$sql1 = "UPDATE `order_master` SET `order_status`= '$status',`delivered_on`='$edd' WHERE `id`='$order_id' AND `user_id`='$customer_id'";
$result1=mysqli_query($con, $sql1);
if($result1)
{
	echo "<script>alert('Current Status Update Successfully !!'); window.location='orders.php';</script>;";

}else
{
	echo "<script>alert('Please Try Again'); window.location='orders.php';</script>;";

}
}
?>