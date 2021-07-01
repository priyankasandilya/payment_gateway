<?php 
session_start();
require('../paymentgatewaypaytm/PaytmKit/lib/config-paytm.php');
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
            <h1>Payment Gateway using Paytm</h1>
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
              <?php
              $custid=base64_encode('cust'.mt_rand(1000,10000));
              $amount=base64_encode(40000);
              ?>
              <a href="ordernow.php?custid=<?php echo $custid; ?>&amount=<?php echo $amount; ?>" class="btn btn-info btn-sm paynow">Pay now</a>
             </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

</div>

<?php include('layouts/footer.php');?>