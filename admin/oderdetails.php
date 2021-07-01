<?php
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
header("location:login.php");
}
include_once('layouts/header.php');
include_once('layouts/navbar.php');
include_once('layouts/sidebar.php');
?>
<?php
if (isset($_GET['oid']))
{
$order_id = $_GET['oid'];
$sql="SELECT * FROM `order_master` WHERE `id`='$order_id'";
$res=mysqli_query($con,$sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Just Rent India</h1>
          <strong>GSTIN</strong>: 29ESYPK6954D1ZV
          <p><strong>Address</strong>: 942,2nd Floor Mahadeshwara Layout,Kumbar Koppal Mysore, pincode-570016</p>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="color: blue;">Order Id : <?php echo $order_id;?></h3>
        </div>
        <div class="card-body">
          <!-- Main content -->
          <div class="row">
            <div class="col-md-12">
              <!-- /.card-header -->
              
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 15px">Phone Number</th>
                    <th style="width: 15px">Customer Name</th>
                    <th style="width: 15px">Address</th>
                    <th style="width: 12px">Expected Delivery Date</th>
                    <th style="width: 15px">Order Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php if(mysqli_num_rows($res)>0){
                  $i=1;
                  while($row=mysqli_fetch_assoc($res)){
                  $user_id=$row['user_id'];
                  $a=$row['cart_ids'];
                  $cart_ids=explode(',',$a);
                  $total_sgst=$row['sgst'];
                  $total_cgst=$row['cgst'];
                  $total_grand=$row['Grand_total'];
                  $payment_type=$row['payment_type'];
                  $order_status =$row['order_status'];
                  $cancel_by = $row['cancel_by'];
                  $Cancel_at = $row['cancel_at'];
                  $coupon_code =$row['coupon_code'];
                  $discount =$row['discount'];
                  $delivered_on =$row['delivered_on'];
                  ?>
                  <tr>
                    
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['address'];?>
                      <p><?php echo $row['city'];?>,<?php echo $row['state'];?>-<?php echo $row['pincode'];?></p>
                    </td>
                    <td><?php echo $delivered_on;?></td>
                    <td>  <?php if($order_status == 1){echo "<span style='color:#1607ff;'>"."Order Placed"."</span>";}elseif($order_status == 2)
                    { echo "Order Shipped";}elseif($order_status == 3){echo "Order out for delivery";}elseif($order_status == 4){ echo "Order Delivered";}elseif($order_status == 6 ){echo "Order Received";}elseif($order_status == 5){echo "<span style='color:red;'>"."Order Cancel"."</span>"."<br>";
                    echo "<span style='color:red;'>".$Cancel_at."<span>"."<br>";
                      if($cancel_by == 2){ echo "User";}elseif($cancel_by == 3){echo "Admin";}
                    }?></td>
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
          </div>
          <h3>Order Items</h3>
          
          <div class="row">
            <div class="col-md-12">
              <!-- /.card-header -->
              <?php
              $ids = join("','",$cart_ids);
              $sql1="SELECT `cart_id`, `pro_id`, `user_id`, `qty`, `form_date`, `to_date`, `Start-time`, `Finish-time`, `rented_items`, `days`, `cart_amount`, `coupon_code`, `final_price`, `cart_status` FROM `tbl_cart` WHERE `cart_id` IN ('$ids') AND `user_id`='$user_id' AND `cart_status`=2";
              $res1=mysqli_query($con,$sql1);
              ?>
              <table class="table table-bordered" style="overflow-x:auto;">
                <thead>
                  <tr>
                    <th style="width: 30px">Item Name</th>
                    <th style="width: 20px">Rental Period</th>
                    <th style="width: 5px">Rent</th>
                    <th style="width: 5px">Deposit</th>
                    <th style="width: 10px">Delivery&pickup Charge</th>
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
                    <td><span style="font-size:14px;">Booking start : <?php echo $row1['form_date'];?><br>
                      Start Time : <?php  $time =$row1['Start-time'];
                      echo date('h:i A',strtotime($time));
                      ?><br>
                      Booking Finish : <?php echo $row1['to_date']?><br>
                      Finish-time : <?php  $time =$row1['Finish-time'];
                      echo date('h:i A',strtotime($time));
                      ?><br>
                      Days : <?php echo $row1['days'];?><br>
                      <?php if($row1['rented_items']!=''){?>
                    free Accessery : <?php echo $row1['rented_items'];?></span><?php }?></td>
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
                    <td><?php echo $sub_total =$cart_amount + $deposit + $deliveryCharge + $SGST_amount + $CGST_amount; ?></td>
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
          </div>
          <center><span style="font-size: 16px; color: red;"><?php if($coupon_code !==''){?>
            Coupon Code : <?php echo $coupon_code;?><br>
            discount Price : <?php echo $discount;?>
          <?php }?></span></center>
          <h3>Payment Mode</h3>
          
          <?php if($payment_type == 'COD')
          {
          echo "Cash on delivery";
          }?>
          <br>
          
          <br>
          <h3> Update Details</h3>
          
          <form method="post" action="action.php">
            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
            <div class="form-group row">
              <div class="col-sm-6">
                <label>Current Status</label>
                <select name="status" class="form-control" id="exampleFirstName" required>
                  <option value="">Select Option</option>
                  <option value="2">Order Shipped</option>
                  <option value="3">Order out for delivery</option>
                  <option value="4">Order Delivered</option>
                  <option value="6">Order Received</option>
                </select>
              </div>
              
              <div class="col-sm-6">
                <label>Expected Delivery Date</label>
                <input type="date" class="form-control" id="exampleFirstName" required name="edd" />
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-2"></div>
              <div class="col-4">
                <button type="submit" name="update_order" class="btn btn-primary btn-user btn-block">
                Update Order
                </button>
              </div>
              <div class="col-4">
                <!-- <button class="btn btn-primary btn-user btn-block" onclick="print()">
                Print Page
                </button> -->
                <a class="btn btn-primary btn-user btn-block" href="invoice.php?oid=<?php echo $order_id?>" role="button"> Invoice</a>
              </div>
              <div class="col-2"></div>
            </div>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php }else
  {
  echo "page not Found";
  }?>
  <?php include('layouts/footer.php');?>