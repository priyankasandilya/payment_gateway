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

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">User Master</li>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Added on</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 $counter=0;
                    $sql = "SELECT `id`, `name`, `email`, `phone`, `password`, `status`, `last_login`, `created_date` FROM `tbl_user`";
                    $res=mysqli_query($con,$sql);
                    if(mysqli_num_rows($res)>0){
                      $i=1;
                      while($row=mysqli_fetch_assoc($res)){
                      ?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $row['name'];?></td>
                 <td><?php echo $row['email'];?></td>
                 <td><?php echo $row['phone'];?></td>
                 <td><?php echo $row['created_date'];?></td>
                </tr>
                  <?php 
            $i++;
            } } else { ?>
            <tr>
              <td colspan="5">No data found</td>
            </tr>
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