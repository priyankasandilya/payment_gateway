<?php 
session_start();
require('config.php');
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
            <h1>Payment Gateway</h1>
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
              <form action="submit.php" method="post">
                <script type="text/javascript"
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                  data-key="<?php echo $publishableKey ?>" 
                  data-amount="500" 
                  data-name="payment gateway by pari" 
                  data-description="payment gateway by pari for testing with stripe" 
                  data-image="dist/img/credit/mastercard.png" 
                  data-currency="inr"
                ></script>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

</div>

<?php include('layouts/footer.php');?>