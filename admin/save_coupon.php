<?php
include_once 'connection.php';
date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");


	if(isset($_POST['save'])){
		$coupon_code = $_POST['coupon_code'];
		$discount = $_POST['discount'];
		$status = "Valid";
		$query = mysqli_query($con, "SELECT * FROM `coupon_code` WHERE `coupon_code` = '$coupon_code'") or die(mysqli_error());
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			echo "<script>alert('Coupon code Already Use !!')</script>";
			echo "<script>window.location = 'add_coupon.php'</script>";
		}else{
			// mysqli_query($con, "INSERT INTO `coupon_code`(`coupon_code`, `coupon_value`, `status`, `created_date`) VALUES ('$coupon_code','$discount','$status','$date'") or die(mysqli_error());
			// echo "<script>alert('Generat Coupon Successfully!')</script>";
			// echo "<script>window.location = 'coupon_code.php'</script>";
			$sql = "INSERT INTO `coupon_code`(`coupon_code`, `coupon_value`, `status`, `created_date`) VALUES ('$coupon_code','$discount','$status','$date')";
			$result = mysqli_query($con,$sql);
			if($result){
			  echo "<script>alert('Generat Coupon Successfully!'); window.location='coupon_code.php';</script>;";
			}
			else{

			 echo "<script>alert('Please Try Again!'); window.location='add_coupon.php';</script>;";
			}
		}
	}

	if(isset($_POST['delete_voucher']))  
 {

    $id=mysqli_real_escape_string($con,$_POST['id']);

   $sql = "DELETE FROM `coupon_code` WHERE `id` =$id";
     $result=mysqli_query($con, $sql);
      if ($result) 
      {
      	echo "<script>alert('Delete Coupon Successfully!'); window.location='coupon_code.php';</script>;";
        
      //   $_SESSION['msg']="Delete succesfully";
      // header("location:coupon_code.php");
        
      } 
      else  
      {  
          echo "<script>alert('Please Try Again !'); window.location='coupon_code.php';</script>;";

      } 
}
?>