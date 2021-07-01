<?php 
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
include_once('layouts/header.php');
include_once('layouts/navbar.php');
include_once('layouts/sidebar.php');
$upload_dir = 'uploads/slider/';
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Slider List</li>

              <li class="breadcrumb-item"> <a href="add_slider.php" class="btn btn-info" role="button">Add Slider</a></li>
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
                  <th>image</th>
                  <th>Description</th>
                  <th> Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 $counter=0;
                    $sql = "SELECT `slider_id`, `slider_nm`, `slider_desc`, `slider_image`, `created_date` FROM `slider` ORDER BY `slider_id` DESC";
                    foreach ($con->query($sql) as $row) {
                  ?>
                <tr>
                 <td><?php echo ++$counter; ?></td>
                  <td><?php echo $row['slider_nm'];?></td>

                  <td>                    
                    <img src="<?php echo "$upload_dir".$row['slider_image'] ?>" style="width:60px;height:60px;border-radius:50%;">
                      </td>
                      <td>
                        <?php echo $row['slider_desc'];?>
                      </td>
                      
                   <td> 
                    <a href='edit_silder.php?id=<?php echo $row['slider_id'];?>' class='btn btn-primary'>Edit</a>
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php echo $row['slider_id'];?>"> Delete</button> 
                 <!-- active and deactive -->
                    </td>
                </tr>
                  <div class="modal fade" id="modal-default<?php echo $row['slider_id'];?>">
                    <div class="modal-dialog">
                      <form method="POST" action="slider_action.php">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete slider</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['slider_id'];?>">
                          <h4 style="color: red;"> Are you sure, you want to delete this slider.  </h4>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input class="btn btn-danger pull-right"  value="Delete" type="submit" name="delete_slider"> 
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
</dir>
</div>

<?php include('layouts/footer.php');?>