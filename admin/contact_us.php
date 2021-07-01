 <?php
session_start();
include('../connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
include_once('layouts/header.php');?>
<?php include_once('layouts/navbar.php');?>
<?php include_once('layouts/sidebar.php'); ?>

           <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact us</h1>
          </div>
          <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Contact us </li>  
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>date</th>
                </tr>
                </thead>
            <tbody>
               <?php
                 $counter=0;
                    $sql = "SELECT * FROM `contact_us`";
                    foreach ($con->query($sql) as $row) {
                  ?>

                <tr>
                  <td><?php echo ++$counter;?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['mobile'];?></td>
                  <td><?php echo $row['subject'];?></td>
                  <td><?php echo $row['message'];?></td>
                  <td><?php echo $row['created_date'];?></td>
             
                </tr>

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


<script  type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<?php include_once 'layouts/footer.php' ?>
