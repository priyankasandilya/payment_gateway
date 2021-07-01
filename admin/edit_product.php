<?php 
session_start();
include('../connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

include_once('layouts/header.php');
include_once('layouts/navbar.php');
include_once('layouts/sidebar.php');
$upload_dir = 'uploads/product/';
?>
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<?php

 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from `product` where id=".$id;
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
      $row = mysqli_fetch_assoc($results);
      $categoryID=$row['cat_id'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>

<?php


if(isset($_POST['edit_prduct'])) {
  $productName = $_POST['productName'];
  $category_name = $_POST['category_name'];
   $productPrice = $_POST['productPrice'];
 
  $isAvailable= $_POST['isAvailable'];
  $shortdesc= $_POST['shortdesc'];
   
    $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    if($imgName){

      $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

      $photo = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize < 5000000){
          unlink($upload_dir.$row['images']);
          move_uploaded_file($imgTmp ,$upload_dir.$photo);
        }else{
          $_SESSION['msg']="Image too large";
        }
      }else{
         $_SESSION['msg']="Please select a valid image";
      }
    }else{
      $photo = $row['images'];
    }
    


 $sql = "UPDATE `product` SET `product_name`='$productName',`cat_id`='$category_name',`price`='$productPrice',`images`='$photo',`description`='$shortdesc',`isAvailable`='$isAvailable' WHERE id = '$id'"; 
$result = mysqli_query($con,$sql);
if($result){
     echo "<script>alert('Update Product Successfully'); window.location='product.php';</script>;"; 
}
else{

 echo "<script>alert('please try again'); window.location='product.php';</script>;";
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
            <h3>Edit Product</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card card-primary">
                <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                   <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                  <div class="form-group">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Product name</label>
                    <input type="text" class="form-control"  name="productName" value="<?php echo $row['product_name']; ?>" required>
                  </div>

                    <div class="form-group">
                         <label>Category Name</label>
                            <select class="form-control" name="category_name" required>
                        <?php
                          $query = "SELECT * FROM `category`";
                          $result1 = mysqli_query($con, $query);
                            while($row2 = mysqli_fetch_array($result1))
                        { ?>
                            <option value="<?php echo $row2['id'];?>" <?php if($row2['id']==$categoryID) echo "selected"; ?>  ><?php echo $row2['category_name'];?></option>
                            <?php };?>
                        </select>
                      </div>   

                              

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                      <input type="text" class="form-control" name="productPrice" value="<?php echo $row['price']; ?>"  required >
                    </div>
                    

                    <div class="form-group">
                        <label>Product status</label>
                        <select class="form-control" name="isAvailable"   style="width: 100%;" required>
                         <option value="" >Select</option>
                         <option value="1" >Available</option>
                        <option value="2" >Not Available</option>
                    </select>
                   
                      </div>  

                       <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="textarea" name="shortdesc" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo $row['description']; ?></textarea>
                        
                      </div>

                 
                          <div class="form-group">
                            <label class="col-md-12">Image </label>
                            <div class="col-md-12">
                            <img src="<?php echo $upload_dir.$row['images'] ?>" width="100">
                            <input type="file" class="form-control" name="image" > </div>
                        
                    </div> 
                  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edit_prduct" id="submit">Submit</button>
                </div>
              
            </div>
            <!-- /.card -->
           </form>
        </div>
    </div>
  </div>
   <script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>


 <?php include'layouts/footer.php';?>



