<?php
session_start();
include('connection.php');
date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");

$upload_dir = 'uploads/slider/';

if(isset($_POST['addslider'])) {
	$t =trim( $_POST['title']);
	$d = trim($_POST['description']);

  

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
          
          // $_SESSION['msg']="Image too large";

          echo "<script>alert('Image too large'); window.location='add_slider.php';</script>;"; 
        }
      }else{
        
        // $_SESSION['msg']="Please select a valid image";
        echo "<script>alert('Please select a valid image'); window.location='add_slider.php';</script>;";

      }
    

$sql = "INSERT INTO `slider`(`slider_nm`, `slider_desc`,`slider_image`,`created_date`) VALUES ('$t','$d','$photo','$date')";
$result = mysqli_query($con,$sql);
if($result){
	  
    echo "<script>alert('Insert Slider successfully'); window.location='slider.php';</script>;"; 
}
else{
echo "<script>alert('Please try again!'); window.location='add_slider.php';</script>;"; 

}

}


if(isset($_POST['delete_slider']))  
 {

    $id=mysqli_real_escape_string($con,$_POST['id']);

    $sql = "DELETE FROM `slider` WHERE `slider_id` = $id";
     $result=mysqli_query($con, $sql);
      if ($result) 
      {
        //   $_SESSION['msg']="Delete succesfully";
        //   header("location:slider_view.php");
        echo "<script>alert('Delete Slider Succesfully'); window.location='slider.php';</script>;"; 
        
      } 
      else  
      {  


           echo "<script>alert('Please try again!'); window.location='slider.php';</script>;"; 
      } 
}






?>