<?php
session_start();
include('connection.php');

date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");

$customer_id = $_SESSION['id'];
if(isset($_POST['add_cart']))
{

$pro_id = $_POST['product_id'];
$pro_price=$_POST['pro_price'];
$qty =1;
$product_on=$_POST['product_on'];
$size=$_POST['size'];
// cart amount
$cart_amount=$pro_price*$qty;

if(isset($_SESSION["id"])){

$sql1 = "SELECT * FROM tbl_cart WHERE pro_id = '$pro_id' AND user_id = '$customer_id' AND cart_status=3";
$res = mysqli_query($con,$sql1);

$count = mysqli_num_rows($res);
if($count > 0){
echo "<script>alert('Product is already added into the cart Continue Shopping..!');window.location = 'index.php'</script>";
}else{

$sql = "INSERT INTO `tbl_cart`(`pro_id`, `user_id`, `qty`,`product_on`,`size`,`cart_amount`,`created_date`) VALUES ('$pro_id','$customer_id','$qty','$product_on','$size','$cart_amount','$date')";
$results = mysqli_query($con,$sql);
echo "<script>alert('Cart Add successfully');window.location ='addtocart.php'</script>";
}
}else{
echo "<script>alert('Please Login First..!');window.location = 'login.php'</script>";
}

}

if(isset($_GET['cart_id']))
{
$id=$_GET['cart_id'];
$sql2 = "DELETE FROM `tbl_cart` WHERE `pro_id`='$id'";
$result = mysqli_query($con,$sql2);
header("location:addtocart.php");
}

?>