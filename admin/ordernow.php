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

                $custid = base64_decode($_GET['custid']);
                $amount = base64_decode($_GET['amount']);
                $orderid = "ORDS".rand(10000,99999999);
?>
<style type="text/css">
  .btn{
    width: 150px;
    height: 30px;
    font-size: 15px;
    background-color: cornflowerblue;
    border: none;
    color: #fff;
  }
</style>
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
              <div class="row">
                <div class="col-sm-6">
                  <img src="../images/1.png" height="400px" width="400px">
                </div>
                
                <div class="col-sm-6">
                  <h4> Your Order Details </h4>
                  <label><?php echo $custid; ?></label>
                  <h5>Products:  <smal style="font-size: 15px;"> MobileXXX<small></h5>
                  <h5>Color:  <smal style="font-size: 15px;"> Red<small></h5>
                  <h4 style="color:blue">Amount: <u>Rs. <?php echo $amount; ?></u></h4>

                  <form method="post" action="../paymentgatewaypaytm/PaytmKit/pgRedirect.php" >
                    <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                    name="ORDER_ID" autocomplete="off"
                    value="<?php echo $orderid ?>">
                    <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $custid ?>">
                    <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                    <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
                    size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                    <input type="hidden"  title="TXN_AMOUNT" tabindex="10" name="TXN_AMOUNT" value="<?php echo $amount; ?>">
                    <input value="CheckOut" name="submit" class="btn" type="submit">
                  </form>
                </div>
              </div>
             </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

</div>

<?php include('layouts/footer.php');?>