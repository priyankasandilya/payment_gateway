<?php
session_start();
include('../connection.php');

 if(isset($_POST['submit'])) 
 {
  $user_email = trim($_POST['user_email']);
  $password = trim($_POST['password']);  
  // $user_password = md5($password);
  $query = mysqli_query($con ,"SELECT  * FROM `admin_login` WHERE `email` = '$user_email' AND `password` = '$password'");
   if($row = mysqli_fetch_array($query))
   {

      $_SESSION['email'] = $row['email'];
      
       $_SESSION['admin_login'] = array(
        'email' => $row['email'],
        'password' => $row['password'],         
        );
        echo "<script>alert('Login Successfully'); window.location = 'dashboard.php';</script>;";

   }else{
               
    echo "<script>alert('please try again'); window.location = 'login.php';</script>;";


   }
}
 ?>