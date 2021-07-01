<?php 
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

include_once('layouts/header.php');

include_once('layouts/navbar.php');

include_once('layouts/sidebar.php');
$upload_dir = 'uploads/subcategory/';
?>
<?php

 if (isset($_GET['id'])) {
    $id = $_GET['id'];
   $sql = "select * from `sub_categories` where sub_id=".$id;
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
      $row = mysqli_fetch_assoc($results);
      $sub_id=$row['sub_id'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>
<?php


if(isset($_POST['edit_subcategory'])) {
  $t = $_POST['title'];
  $c=$_POST['category'];

  $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    if($imgName){

      $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

      $photo = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize < 5000000){
          unlink($upload_dir.$row['sub_image']);
          move_uploaded_file($imgTmp ,$upload_dir.$photo);
        }else{
          $_SESSION['msg']="Image too large";
        }
      }else{
         $_SESSION['msg']="Please select a valid image";
      }
    }else{
      $photo = $row['sub_image'];
    }
    
  $sql = "UPDATE `sub_categories` SET `sub_nm`='$t',`sub_cat_id`='$c',`sub_image`='$photo' WHERE `sub_id` = '$id'";
  $result = mysqli_query($con,$sql);
      if($result){
           echo "<script>alert('Update Subcategory Successfully'); window.location='subcategory.php';</script>;"; 
      }
      else{

       echo "<script>alert('please try again'); window.location='subcategory.php';</script>;";
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
            <h1>Edit Sub Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="subcategory.php">Sub Category</a></li>
                <li class="breadcrumb-item active">Edit Sub Category</li>
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
                   <input type="hidden" name="id" value="<?php echo $row['sub_id'];?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $row['sub_nm']; ?>">
                  </div>
                   <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" >
                          <option>select option</option>
                          <?php 
                          $sql="SELECT * FROM categories LEFT JOIN sub_categories ON sub_cat_id=cat_id";
                          $result=mysqli_query($con,$sql);
                          foreach ($result as $row1) {?>
                          <option value="<?php echo $row1['cat_id'];?>" required <?php if($sub_id == $row1['sub_id']) echo "selected" ?>><?php echo $row1['cat_nm'];?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                <div class="form-group">
                <label class="col-md-12">Subcategory image </label>
                <div class="col-md-12">
                 
                  <img src="<?php echo $upload_dir.$row['sub_image'];?>" width="100">
              <input type="file" class="form-control" name="image"> </div>
    
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edit_subcategory">Update</button>
                </div>
              </form>
            </div>
            
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('layouts/footer.php'); ?>
