<?php
session_start();
include_once '../connection.php';
date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");
$upload_dir = 'uploads/product/';

if(isset($_POST['addproduct']))
{
$product_name = mysqli_real_escape_string($con,$_POST['productName']);
$category_id = $_POST['category_name'];
$product_price = $_POST['productPrice'];
$isAvailable = $_POST['isAvailable'];
$shortdesc = mysqli_real_escape_string($con,$_POST['shortdesc']);

$imgName = $_FILES['image']['name'];
$imgTmp = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];

$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$photo = time().'_'.rand(1000,9999).'.'.$imgExt;
if(in_array($imgExt, $allowExt)){
if($imgSize < 5000000){
move_uploaded_file($imgTmp ,$upload_dir.$photo);
}else{
echo "<script>alert('Image too large'); window.location='add_product.php';</script>;";
}
}else{
echo "<script>alert('Please select a valid image'); window.location='add_product.php';</script>;";
}

$sql = "INSERT INTO `product`(`product_name`, `cat_id`, `price`, `images`, `description`, `isAvailable`, `created_date`) VALUES ('$product_name','$category_id','$product_price','$photo','$shortdesc','$isAvailable','$date')";
$result = mysqli_query($con,$sql);
if($result){
echo "<script>alert('Insert Product successfully'); window.location='product.php';</script>;";

}
else{
echo "<script>alert('Please Try Again!'); window.location='add_product.php';</script>;";
}
}


if(isset($_POST['delete_product']))
{
$id=mysqli_real_escape_string($con,$_POST['id']);
$sql = "DELETE FROM `product` WHERE `id` = $id";
$result=mysqli_query($con, $sql);
if ($result)
{
echo "<script>alert('Delete product Succesfully'); window.location='product.php';</script>;";
}
else
{
echo "<script>alert('Please try again!'); window.location='product.php';</script>;";
}
}
?>