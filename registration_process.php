<?php

include('connection.php');

date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");

if(isset($_POST['customer_register']))
{
	$n = mysqli_real_escape_string($con,$_POST['customer_name']);

	$e = mysqli_real_escape_string($con,$_POST['customer_email']);

	$no = mysqli_real_escape_string($con,$_POST['customer_number']);

	$pass = md5($_POST['password']);

	$sql_u = "SELECT `email` FROM `tbl_user` WHERE email='$e'";
  	$sql_e = "SELECT `phone` FROM `tbl_user` WHERE phone='$no'";
  	$res_u = mysqli_query($con, $sql_u);
  	$res_e = mysqli_query($con, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	 // $name_error = "Sorry... username already taken"; 
  	  echo "<script>alert('Sorry...Email ID. already exists');window.location='login.php'</script>";
  	}else if(mysqli_num_rows($res_e) > 0){
  	 // $email_error = "Sorry... email already taken"; 	
  	   	  echo "<script>alert('Sorry...Mobile No. already exists');window.location='login.php'</script>";

  	}else{	
		    
		        
		        $sql = "INSERT INTO `tbl_user`(`name`, `email`, `phone`, `password`, `created_date`) VALUES ('$n','$e','$no','$pass','$date')";
				$result = mysqli_query($con,$sql);

				if($result){
					echo "<script>alert('Register Successfully!!');window.location='login.php'</script>";
				}else{
					echo "<script>alert('please try again!!');window.location='index.php'</script>";
				}   
		        
		}
}
?>