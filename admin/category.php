<?php 
session_start();
include('../connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

include_once('layouts/header.php');

include_once('layouts/navbar.php');

include_once('layouts/sidebar.php');
$upload_dir = 'uploads/';
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Category List</li>

              <li class="breadcrumb-item"> <a href="add_category.php" class="btn btn-info" role="button">Add Category</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr no</th>
                  <th>Title</th>
                  <th> Image </th>
                  <th> Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                 $counter=0;
                    $sql = "SELECT `cat_id`, `cat_nm`,`cat_image`,`created_date` FROM `categories` ";
                    foreach ($con->query($sql) as $row) {
                  ?>
                <tr>
                  <td><?php echo ++$counter; ?></td>
                  <td><?php echo $row['cat_nm'];?></td>
                <td>                    
                    <img src="<?php echo "$upload_dir".$row['cat_image'] ?>" style="width:60px;height:60px;border-radius:50%;">
                      </td>
                  <td><a href='edit_category.php?id=<?php echo $row['cat_id'];?>' class='btn btn-primary'>Edit</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php echo $row['cat_id'];?>"> Delete</button></td>
                </tr>
                  <div class="modal fade" id="modal-default<?php echo $row['cat_id'];?>">
                    <div class="modal-dialog">
                      <form method="POST" action="category_action.php">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete Category</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['cat_id'];?>">
                          <h4 style="color: red;"> Are you sure, you want to delete this Category.  </h4>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input class="btn btn-danger pull-right"  value="Delete" type="submit" name="deletecategory"> 
                        </div>
                      </div>
                      </form>
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                <?php }?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
</dir>
</div>

<?php include('layouts/footer.php');?>