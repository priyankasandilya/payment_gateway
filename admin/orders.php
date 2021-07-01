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
            <h1>Recent Bookings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Recent Bookings</li>
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
               
                  <th>Order Id</th>
                  <th>Phone no.</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th> Expected Delivery Date</th>
                  <th>Order Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 $counter=0;
                    $sql = " SELECT * FROM `order_master` Order By `id` DESC ";
                    $rowsql = mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($rowsql)){
                              $order_status =$row['order_status']; 
                              $cancel_by = $row['cancel_by'];
                              $Cancel_at = $row['cancel_at'];
                  ?>
                <tr>
                  <td><?php echo $row['id'];?></td>

                  <td><?php echo $row['phone']?> </td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['address'];?>
                  <p><?php echo $row['city'];?>,<?php echo $row['state'];?>-<?php echo $row['pincode'];?></p>
                  </td>
                  <td><?php echo $row['delivered_on'];?></td>
                  
                  <td>  <?php if($order_status == 1){echo "<span style='color:#1607ff;'>"."Order Placed"."</span>";}elseif($order_status == 2)
                    { echo "Order Shipped";}elseif($order_status == 3){echo "Order out for delivery";}elseif($order_status == 4){ echo "Order Delivered";}elseif($order_status == 6 ){echo "Order Received";}elseif($order_status == 5){echo "<span style='color:red;'>"."Order Cancel"."</span>"."<br>";
                    echo "<span style='color:red;'>".$Cancel_at."<span>"."<br>";
                      if($cancel_by == 2){ echo "User";}elseif($cancel_by == 3){echo "Admin";}
                    }?></td>
                      
                   <td> 
                    <a href='oderdetails.php?oid=<?php echo $row['id'];?>' class='btn btn-primary'>Details</a>
                    <a href='kycdetails.php?oid=<?php echo $row['id'];?>' class='btn btn-info'>KYC Details</a>
                    </td>
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