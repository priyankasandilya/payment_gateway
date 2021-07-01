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

           <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SubCategory List</h1>
          </div>
          <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subcategory List </li>
             <li class="breadcrumb-item"> <a href="add_subcategory.php" class="btn btn-info" role="button">Add subcategory</a></li>
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
                  <th>category</th>
                  <th>Subcategory</th>
                  <th>Subcategory Image</th>
                  <th> Action</th>
                </tr>
                </thead>
            <tbody>
               <?php
                 $counter=0;
              $sql = "SELECT `sub_id`, `sub_nm`, `sub_cat_id`,`sub_image`,`created_date` FROM `sub_categories`";
                    foreach ($con->query($sql) as $row) {
                  ?>
                <tr>
                  <td><?php echo ++$counter; ?></td>
                  <td><?php  $cat_id=$row['sub_cat_id'];
                  $sql1="SELECT `cat_id`, `cat_nm`, `cat_image`, `created_date` FROM `categories` WHERE `cat_id`=$cat_id";
                  foreach ($con->query($sql1) as $row1) {
                    echo $row1['cat_nm'];
                  }
                  ?></td>
                  <td><?php echo $row['sub_nm'];?></td>
                  <td><img src="<?php echo "$upload_dir".$row['sub_image'] ?>" style="width:60px;height:60px;border-radius:50%;"></td>

                  <td><a href='edit_subcategory.php?id=<?php echo $row['sub_id'];?>' class='btn btn-primary'>Edit</a>
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php echo $row['sub_id'];?>"> Delete</button> 
                    </td>
                </tr>
                  <div class="modal fade" id="modal-default<?php echo $row['sub_id'];?>">
                    <div class="modal-dialog">
                      <form method="POST" action="action_subcategory.php">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete subcategoryr</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['sub_id'];?>">
                          <h4 style="color: red;"> Are you sure, you want to delete this Subcategory.  </h4>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
                            <input class="btn btn-danger pull-right"  value="Delete" type="submit" name="delete_subcategory"> 
                        </div>
                      </div>
                      <!-- /.modal-content -->
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
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<?php include('layouts/footer.php');?>
