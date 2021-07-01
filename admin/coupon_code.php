<?php
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
include_once('layouts/header.php');?>
<?php include_once('layouts/navbar.php');?>
<?php 
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
  $type=$_GET['type'];
  $id=$_GET['id'];
  if($type=='delete'){
    mysqli_query($con,"delete from old_coupon_code where id='$id'");
    // redirect('coupon_code.php');
 header("Location: coupon_code.php");
  }
  if($type=='active' || $type=='deactive'){
    $status=1;
    if($type=='deactive'){
      $status=0;
    }
    mysqli_query($con,"update old_coupon_code set status='$status' where id='$id'");
    // redirect('coupon_code.php');
     header("Location: coupon_code.php");

  }

}

$sql="select * from old_coupon_code order by id desc";
$res=mysqli_query($con,$sql);

?>
<?php include_once('layouts/sidebar.php'); ?>
 


           <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon List</h1>
          </div>
          <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Coupon List </li>
             <li class="breadcrumb-item"> <a href="add_coupon.php" class="btn btn-info" role="button">Add Coupon</a></li>
              
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
                   <th>S.No #</th>
                   <th>Code/Value</th>
                   <th>Type</th>
              <!-- <th >Cart Min</th> -->
              <th >Expired On</th>
              <th >Added On</th>
              <th>Actions</th>
                </tr>
                </thead>
            <tbody>
              <?php if(mysqli_num_rows($res)>0){
            $i=1;
            while($row=mysqli_fetch_assoc($res)){
            ?>

               <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['coupon_code']?><br/>
              <?php echo $row['coupon_value']?></td>
              <td><?php echo $row['coupon_type']?></td>
             <!--  <td><?php echo $row['cart_min_value']?></td> -->
              <td>
              <?php 
              if($row['expired_on']=='0000-00-00'){
                
              }else{
                echo $row['expired_on'];
              }
              ?>
              </td>
              <td>
              <?php 
              $dateStr=strtotime($row['created_date']);
              echo date('d-m-Y',$dateStr);
              ?>
              </td>
              <td>
                <a href="add_coupon.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
                <?php
                if($row['status']==1){
                ?>
                <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
                <?php
                }else{
                ?>
                <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
                <?php
                }
                ?>
                &nbsp;
                <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
              </td>
                           
                        </tr>
                        <?php 
            $i++;
            } } else { ?>
            <tr>
              <td colspan="5">No data found</td>
            </tr>
            <?php } ?>
             
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

<?php include('layouts/footer.php')?>
