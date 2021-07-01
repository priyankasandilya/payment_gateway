 <?php
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
include_once('layouts/header.php');?>
<?php include_once('layouts/navbar.php');?>
<?php include_once('layouts/sidebar.php');?>
<?php
if (isset($_GET['oid']))
{
$order_id = $_GET['oid'];
$sql="SELECT * FROM `order_master` WHERE `id`='$order_id'";
$res=mysqli_query($con,$sql);
if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);
      $addedon =$row['created_date'];
      $shipping_name = $row['name'];
      $shipping_phone = $row['phone'];
      $shipping_address =$row['address'];
      $shipping_city = $row['city'];
      $shipping_state = $row['state'];
      $shipping_pincode = $row['pincode'];
      $shipping_email = $row['email'];
      $user_id=$row['user_id'];
      $a=$row['cart_ids'];
      $cart_ids=explode(',',$a);
      $total_rent =$row['subtotal'];
      $total_sgst=$row['sgst'];
      $total_cgst=$row['cgst'];
      $total_dp=$row['delivery_pickup'];
      $total_deposit=$row['Ref_deposit'];
      $total_grand=$row['Grand_total'];
      $discount_amount=$row['discount'];

}
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <?php   
 $tab_query = "SELECT `id`, `customer_name`, `customer_email`,`customer_mobile`, `address`, `city`, `state`, `pincode` FROM `tbl_customer` WHERE `id`='$user_id'";
$tab_result = mysqli_query($con,$tab_query);
while($tab_row = mysqli_fetch_array($tab_result))
{
$cid= $tab_row['id'];
$cname= $tab_row['customer_name'];
$cnumber= $tab_row['customer_mobile'];
$cemail =$tab_row['customer_email'];
$address =$tab_row['address'];
$city=$tab_row['city'];
$state = $tab_row['state'];
$pincode =$tab_row['pincode'];
}
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <center> TAX INVOICE</center>
                    <!-- <small class="float-right">Date: 2/10/2014</small> -->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <img src="../assets/img/logo/newlogo.png" title="campany details" style="width: 60%;">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <h2>Just Rent India</h2>
                 <address>
                    942,2nd Floor Mahadeshwara Layout,<br>
                    Kumbar Koppal Mysore, pincode-570016<br>
                    GSTIN 11111111111111111111<br>
                    Phone: +91 8553535605<br>
                    Email: info@justrentindia.com
                  </address>
                    Date : <?php 
                $dateStr=strtotime($addedon);
              echo date('d-m-Y',$dateStr);
              ?><br>
                  Order/Invoice : #<?php echo $order_id;?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
                <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Billing To 
                  <address>
                    <strong><?php echo $cname;?></strong><br>
                    <?php echo $address;?>,<?php echo $city;?>,<br>
                    <?php echo $state;?> <?php echo $pincode;?><br>
                    Phone: +91 <?php echo $cnumber;?><br>
                    Email: <?php echo $cemail;?>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Shipping To 
                  <address>
                    <strong><?php echo $shipping_name;?></strong><br>
                    <?php echo $shipping_address;?>,<?php echo $shipping_city;?><br>
                    <?php echo $shipping_state;?>&nbsp;&nbsp;<?php echo $shipping_pincode;?><br>
                    Phone: +91 <?php echo $shipping_phone;?>  <br>
                    Email: <?php echo $shipping_email;?>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                   <?php
              $ids = join("','",$cart_ids);
               $sql1="SELECT `cart_id`, `pro_id`, `user_id`, `qty`, `form_date`, `to_date`, `Start-time`, `Finish-time`, `rented_items`, `days`, `cart_amount`, `coupon_code`, `final_price`, `cart_status` FROM `tbl_cart` WHERE `cart_id` IN ('$ids') AND `user_id`='$user_id' AND `cart_status`=2";
              $res1=mysqli_query($con,$sql1);
              ?>
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th style="width: 30px">Item Name</th>
                    <th style="width: 20px">Rental Period</th>
                    <th style="width: 5px">Rent</th>
                    <th style="width: 5px">Deposit</th>
                    <th style="width: 10px">Delivery&pickup Charge</th></th>
                    <th style="width: 10px">SGST</th>
                    <th style="width: 10px">CGST</th>
                    <th style="width: 7px">Quantity</th>
                    <th style="width: 10px">Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(mysqli_num_rows($res1)>0){
                        $i=1;
                        while($row1=mysqli_fetch_assoc($res1)){
                        $proid=$row1['pro_id'];
                        $cart_amount=$row1['cart_amount'];
                      ?>
                    <tr>
                       <?php $sql2 = "SELECT `id`, `productName`, `productPrice`, `deliveryCharge`, `deposit` FROM `tbl_product` WHERE `id`='$proid'";
                    foreach ($con->query($sql2)  as $row2) {
                      
                      $deliveryCharge=$row2['deliveryCharge'];
                      $deposit=$row2['deposit'];


                      ?>
                    <td> <?php echo $row2['productName'];?></td>
                    
                    <?php }?>
                     <td><span style="font-size:14px;"><?php echo $row1['form_date'];?>
                     <?php  $time =$row1['Start-time'];
                      echo date('h:i A',strtotime($time));
                      ?> <br> TO <br>
                      <?php echo $row1['to_date']?>
                      <?php  $time =$row1['Finish-time'];
                      echo date('h:i A',strtotime($time));
                      ?><br>
                      Days : <?php echo $row1['days'];?><br>
                    free Accessery : <?php echo $row1['rented_items'];?></span></td>
                    <td><?php echo $cart_amount;?></td>
                    <td><?php echo $deposit;?></td>
                    <td><?php echo $deliveryCharge;?></td>
                    <td><?php $SGST=$cart_amount + $deliveryCharge;
                              $SGST_amount=($SGST*9) / 100;
                         echo $SGST_amount;?> @9%</td>
                    <td><?php $CGST=$cart_amount + $deliveryCharge;
                              $CGST_amount=($CGST*9) / 100;
                         echo $CGST_amount;?>  @9%</td>
                    <td><?php echo $row1['qty'];?></td>
                    <td><?php echo $sub_total =$cart_amount + $deposit + $deliveryCharge + $SGST_amount + $CGST_amount; ?>

                        </td>
                    </tr>
                    <?php
                     $i++;
                     } } else { ?>
                  <tr>
                    <td>No data found</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  

                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width:50%">Total Rent </th>
                        <td> <?php echo $total_rent;?></td>
                      </tr>
                      <tr>
                        <th>Total Refundable Deposit</th>
                        <td> <?php echo $total_deposit;?></td>
                      </tr>
                      <tr>
                        <th>Delivery and pickup</th>
                        <td><?php echo $total_dp;?></td>
                      </tr>
                      <tr>
                        <th>Total SGST </th>
                        <td><?php echo $total_sgst;?></td>
                      </tr>
                      <tr>
                        <th>Total CGST :</th>
                        <td><?php echo $total_cgst;?></td>
                      </tr>
                      <tr>
                        <th>Discount :</th>
                        <td><?php echo $discount_amount;?></td>
                      </tr>
                      <tr>
                        <th>Grand Total :</th>
                        <td><?php echo $total_grand;?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-success float-right" onClick="window.print()"><i class="fas fa-print"></i> 
                    Print
                  </button>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   <?php }else
  {
  echo "page not Found";
  }?>
    <?php include('layouts/footer.php')?>