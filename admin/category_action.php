<?php
session_start();
include_once 'connection.php';
date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");
$upload_dir = 'uploads/';

if(isset($_POST['addcategory'])) {
	$t = trim($_POST['title']);

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
          echo "<script>alert('Image too large'); window.location='add_category.php';</script>;"; 
        }
      }else{
        echo "<script>alert('Please select a valid image'); window.location='add_category.php';</script>;";

      }
	
 $sql = "INSERT INTO `categories`(`cat_nm`,`cat_image`,`created_date`) VALUES ('$t','$photo','$date')"; 
$result = mysqli_query($con,$sql);
if($result){
  echo "<script>alert('Insert Category successfully'); window.location='category.php';</script>;";
    
}
else{

	 echo "<script>alert('Please try again!'); window.location='add_category.php';</script>;";
}

}


if(isset($_POST['deletecategory']))  
 {

    $id=mysqli_real_escape_string($con,$_POST['id']);

    $sql = "DELETE FROM `categories` WHERE `cat_id` = $id";
     $result=mysqli_query($con, $sql);
      if ($result) 
      {

        echo "<script>alert('Delete category Succesfully'); window.location='category.php';</script>;"; 
      } 
      else  
      {  
           echo "<script>alert('Please try again!'); window.location='category.php';</script>;"; 

      } 
}






?>