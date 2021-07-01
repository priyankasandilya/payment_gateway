<?php 
session_start();
include('../connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

include_once('layouts/header.php');

include_once('layouts/navbar.php');

include_once('layouts/sidebar.php');
?>
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>ADD PRODUCT</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Product</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <div class="card card-primary">
    <form method="POST" action="product_action.php" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Product name</label>
          <input type="text" class="form-control" placeholder="Enter product name"  name="productName"  required>
        </div>
        <div class="form-group">
          <label>Category Name</label>
            <select class="form-control" name="category_name"  required>
            <option value="">Select Category...</option>
            <?php
            $query = "SELECT * FROM `category`";
            $result1 = mysqli_query($con, $query);
            while($row2 = mysqli_fetch_array($result1))
            { ?>
            <option value="<?php echo $row2['id'];?>" ><?php echo $row2['category_name'];?></option>
            <?php };?>
          </select>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Product Price</label>
          <input type="text" class="form-control" name="productPrice" placeholder="Enter product Proice" required maxlength="255" required>
        </div>
        
        <!-- <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Charge</label>
          <input type="text" class="form-control"  name="deliveryCharge" required >
        </div> -->              
        <div class="form-group">
          <label>Product status</label>
          <select class="form-control" name="isAvailable"   style="width: 100%;" required>
            <option value="" >Select</option>
            <option value="1" >Available</option>
            <option value="2" >Not Available</option>
          </select>
          
        </div>
        <div class="mb-3">
          <label>product Description</label>
          <textarea class="textarea" name="shortdesc" placeholder="Place some text here" required  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          
        </div>
              
        <div class="form-group">
          <label class="col-md-12">Product Image </label>
          <div class="col-md-12">
          <input type="file" class="form-control" name="image" required> </div>
          
        </div>
        
        <div class="card-footer">
          <button type="submit" class="btn btn-primary" name="addproduct">Submit</button>
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
  <script>
function getCategory(val) {
  $.ajax({
  type: "POST",
  url: "get_category.php",
  data:'category_id='+val,
  success: function(data){
    $("#subcategory_list").html(data);
  }
  });
}
</script>
 
  <?php include'layouts/footer.php';?>
