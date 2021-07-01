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

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product List </li>
             <li class="breadcrumb-item"> <a href="add_product.php" class="btn btn-info" role="button">Add product</a></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">  
  
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
            
                <thead>
                <tr>
                   <th>Sr no</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>MRP </th>
                  <th>Image</th>
                  
                  <th> Action</th>
                </tr>
                </thead>
            <tbody>
               <?php
                 $counter=0;
                $sql = "SELECT `id`, `product_name`, `cat_id`, `price`, `images`, `description`, `created_date` FROM `product` ORDER BY `id` DESC";
                    foreach ($con->query($sql) as $row) {
                  ?>
                <tr>
                  <td><?php echo ++$counter; ?></td>
                  <td><?php echo $row['product_name'];?></td>
                  <td><?php 
                    $category_id=$row['cat_id'];
                    $sql1="SELECT * FROM `category` where `id`='$category_id'";
                    foreach ($con->query($sql1) as $row1) {
                        echo $row1['category_name'];
                    } 
                  ?>
                  </td>

                   <td><?php echo $row['price'];?></td>
                
                   <td><img src="<?php echo "$upload_dir".$row['images'] ?>" width="50" height="50"></td>
                  <td><a href='edit_product.php?id=<?php echo $row['id'];?>' class='btn btn-primary'>Edit</a>
                   &nbsp;&nbsp;
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php echo $row['id'];?>"> Delete</button> 
                    </td>
                </tr>
                  <div class="modal fade" id="modal-default<?php echo $row['id'];?>">
                    <div class="modal-dialog">
                      <form method="POST" action="product_action.php">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete product</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id'];?>">
                          <h4 style="color: red;"> Are you sure, you want to delete this Product.  </h4>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
                            <input class="btn btn-danger pull-right"  value="Delete" type="submit" name="delete_product"> 
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
              <?php }?>
                  </tbody>
           
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php include('layouts/footer.php');?>
