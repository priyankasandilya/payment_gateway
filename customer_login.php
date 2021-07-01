<?php
session_start();
include_once('connection.php');

if(isset($_POST['customer_login']))
{
$e = $_POST['customer_email'];
$p = $_POST['password'];
$customer_password = md5($p);

$sql = "select * from `tbl_user` where `email`='$e' and `password`='$customer_password' ";
$result = mysqli_query($con,$sql);


if($row = mysqli_fetch_array($result))
{
$_SESSION['id'] = $row['id'];

$_SESSION['customer_email'] = $row['email'];
$_SESSION['customer_name'] = $row['name'];


$_SESSION['tbl_customer'] = array(
'id' => $row['id'],
'name' => $row['name'],
'email' => $row['email'],
'password'=>$row['password'],
'phone'=>$row['phone'],
);

echo "<script>alert('Login Successfully!!');window.location='index.php'</script>";
}else{
echo "<script>alert('Username and Password is incorrect!!');window.location='login.php'</script>";
}
}
?>