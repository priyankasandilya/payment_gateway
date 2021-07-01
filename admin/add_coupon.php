<?php 
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
$msg="";
$coupon_code="";
$coupon_type="";
$coupon_value="";
$cart_min_value="";
$expired_on="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
  $id=$_GET['id'];
  $row=mysqli_fetch_assoc(mysqli_query($con,"select * from old_coupon_code where id='$id'"));
  $coupon_code=$row['coupon_code'];
  $coupon_type=$row['coupon_type'];
  $coupon_value=$row['coupon_value'];
  $expired_on=$row['expired_on'];
}

if(isset($_POST['submit'])){
  $coupon_code=$_POST['coupon_code'];
  $coupon_type=$_POST['coupon_type'];
  $coupon_value=$_POST['coupon_value'];
  // $cart_min_value=$_POST['cart_min_value'];
  $expired_on=$_POST['expired_on'];
  $added_on=date('Y-m-d h:i:s');
  
  if($id==''){
    $sql="select * from old_coupon_code where coupon_code='$coupon_code'";
  }else{
    $sql="select * from old_coupon_code where coupon_code='$coupon_code' and id!='$id'";
  } 
  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $msg="Coupon code already added";
  }else{
    if($id==''){
      
      // mysqli_query($con,"insert into coupon_code(coupon_code,coupon_type,coupon_value,cart_min_value,expired_on,status,added_on) values('$coupon_code','$coupon_type','$coupon_value','$cart_min_value','$expired_on',1,'$added_on')");
      mysqli_query($con,"INSERT INTO `old_coupon_code`(`coupon_code`, `coupon_type`, `coupon_value`, `expired_on`, `status`, `created_date`) VALUES ('$coupon_code','$coupon_type','$coupon_value','$expired_on',1,'$added_on')");
    }else{
      mysqli_query($con,"update old_coupon_code set coupon_code='$coupon_code', coupon_type='$coupon_type' , coupon_value='$coupon_value',expired_on='$expired_on' where id='$id'");
    }
    
    // redirect('coupon_code.php');
   header("Location: coupon_code.php");
  }
}
?>



<?php include_once('layouts/header.php');?>
<?php include_once('layouts/navbar.php');?>
<?php include_once('layouts/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Generate Coupon</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="coupon_code.php">coupon List</a></li>
                <li class="breadcrumb-item active">Generate Coupon</li>
            </ol> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="POST">
                <div class="card-body">
                 
                  <div class="form-group">
					<label>Coupon Code</label>
					<input type="text" class="form-control" name="coupon_code" required="required" value="<?php echo $coupon_code?>"/>
          <div class="error mt8"><?php echo $msg?></div>
				</div>
        <div class="form-group">
                      <label for="exampleInputName1">Coupon Type</label>
                      <select name="coupon_type" required class="form-control">
            <option value="">Select Type</option>
            <?php
            $arr=array('P'=>'Percentage','F'=>'Fixed');
            foreach($arr as $key=>$val){
              if($key==$coupon_type){
                echo "<option value='".$key."' selected>".$val."</option>";
              }else{
                echo "<option value='".$key."'>".$val."</option>";
              }
              
            }
            ?>
            </select>
            
                    </div>
				<div class="form-group">
                      <label for="exampleInputEmail3" required>Coupon Value</label>
                      <input type="textbox" class="form-control" placeholder="Coupon Value" name="coupon_value"  value="<?php echo $coupon_value?>">
                    </div>
           <div class="form-group">
                      <label for="exampleInputEmail3">Expired On</label>
                      <input type="date" class="form-control" placeholder="Expired On" name="expired_on"  value="<?php echo $expired_on?>">
                    </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                </div>
              </form>
            </div>
            
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php include('layouts/footer.php');?>