<?php
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
include_once('layouts/header.php');?>
<?php include_once ('layouts/navbar.php'); ?>
<?php include_once ('layouts/sidebar.php');

date_default_timezone_set("asia/calcutta");
$updated_date = date("Y-m-d h:i:s");
$upload_dir = 'uploads/slider/';

 ?>

<?php

 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from `slider` where slider_id=".$id;
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
      $row = mysqli_fetch_assoc($results);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>

<?php


if(isset($_POST['edit_slider'])) {
  $t = $_POST['title'];
  $d = $_POST['description'];


    $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    if($imgName){

      $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

      $photo = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize < 5000000){
          unlink($upload_dir.$row['slider_image']);
          move_uploaded_file($imgTmp ,$upload_dir.$photo);
        }else{
          // $_SESSION['msg']="Image too large";
        	echo "<script>alert('Image too large'); window.location='slider.php';</script>;"; 
        }
      }else{
         // $_SESSION['msg']="Please select a valid image";
      	echo "<script>alert('Please select a valid image'); window.location='slider.php';</script>;"; 
      }
    }else{
      $photo = $row['slider_image'];
    }
    


 $sql = "UPDATE `slider` SET `slider_nm`='$t',`slider_desc`='$d',`slider_image`='$photo' WHERE `slider_id`	= '$id'"; 
$result = mysqli_query($con,$sql);
if($result){
     echo "<script>alert('Update Slider Successfully'); window.location='slider.php';</script>;"; 
}
else{

 echo "<script>alert('Please Try Again...!!!'); window.location='slider.php';</script>;";
}

}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="silderlist.php">Slider</a></li>
                <li class="breadcrumb-item active">Update Slider</li>
            </ol>
          </div>  
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="POST" action="" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="<?php echo $row['slider_id'];?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $row['slider_nm']; ?>">
                  </div>
                
                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description" value="<?php echo $row['slider_desc']; ?>"><?php echo $row['slider_desc']; ?></textarea>
                      </div>
                   <div class="form-group">
                <label class="col-md-12">Image </label>
                <div class="col-md-12">
                   <img src="<?php echo $upload_dir.$row['slider_image'] ?>" width="100">
              <input type="file" class="form-control" name="image" > </div>
    
                   </div> 
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edit_slider">Update</button>
                </div>
              </form>
            </div>
            
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
<?php include('layouts/footer.php');?>

