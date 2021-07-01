<?php 
session_start();
include('connection.php');
if(!isset($_SESSION["email"])) {
  header("location:login.php");
}
include_once('layouts/header.php');
include_once('layouts/navbar.php');
include_once('layouts/sidebar.php');
$upload_dir = '../kyc image/';
?>
<?php
if (isset($_GET['oid']))
{
$order_id = $_GET['oid'];
$sql="SELECT * FROM `tbl_kyc` WHERE `kyc_id`='$order_id'";
$res=mysqli_query($con,$sql);
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
     $receiver_name =$row['receiver_name'];
     $receiver_address1 =$row['receiver_address1'];
     $receiver_profile =$row['receiver_profile'];
     $receiver_email =$row['receiver_email'];
     $receiver_mobile =$row['receiver_mobile'];
     $receiver_mobile2 =$row['receiver_mobile2'];
     $upload_adhaar =$row['upload_adhaar'];
     $upload_dl =$row['upload_dl'];
     $upload_rc =$row['upload_rc'];
     $upload_other =$row['upload_other'];
     $withness_name =$row['withness_name'];
     $withness_address =$row['withness_address'];
     $withness_profile =$row['withness_profile'];
     $withness_email =$row['withness_email'];
     $withness_mobile =$row['withness_mobile'];
     $withness_mobile2 =$row['withness_mobile2'];
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KYC Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashoboard.php">Home</a></li>
              <li class="breadcrumb-item active">KYC Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">KYC Details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
        	<center><h3>Recevier Details</h3></center>
        	<br>
          <div class="row">
          	<div class="col-lg-4 col-md-4 col-sm-4">
          		
          	<img src="<?php echo "$upload_dir".$receiver_profile?>" style="height: 200px;width: 350px">
          	Uploaded Receiver Image
          	</div>
          	<div class="col-lg-8 col-md-8 col-sm-8">
          		 <ul class="list-unstyled">
                <li>
 	                 <strong>Receiver Name : </strong> <?php echo $receiver_name;?>
                </li>
                <li>
                  <strong>Receiver Mobile No. : </strong> <?php echo $receiver_mobile;?>
                </li>
                <li>
                  <strong>Receiver Alternative Mobile No. : </strong> <?php echo $receiver_mobile2;?></a>
                </li>
                <li>
                  <strong>Receiver Email ID : </strong> <?php echo $receiver_email;?></a>
                </li>
                <li>
                  <strong> Receiver Address :</strong> <?php echo $receiver_address1;?></a>
                </li>
              </ul>

          	</div>
          </div>
          	<center><h3>Withness Details</h3></center>
          	<br>
          <div class="row">
          	<div class="col-lg-4 col-md-4 col-sm-4">
          		
          	<img src="<?php echo "$upload_dir".$withness_profile;?>" style="height: 200px;width: 350px">
          	Uploaded Withness Image
          	</div>
          	<div class="col-lg-8 col-md-8 col-sm-8">
          		 <ul class="list-unstyled">
                <li>
 	                 <strong>Withness Name : </strong> <?php echo $withness_name;?>
                </li>
                <li>
                  <strong>Withness Mobile No. : </strong><?php echo $withness_mobile?>
                </li>
                <li>
                  <strong>Withness Alternative Mobile No. : </strong> <?php echo $withness_mobile2?></a>
                </li>
                <li>
                  <strong>Withness Email ID : </strong> <?php echo $withness_email;?></a>
                </li>
                <li>
                  <strong>Withness Address :</strong> <?php echo $withness_address;?></a>
                </li>
              </ul>

          	</div>
          </div>
          <!-- KYC Details -->
          <center><h3>KYC Uploaded Image</h3></center>
          <br>
          <div class="row">
          	<div class="col-lg-3 col-md-3 col-sm-3">
          		
          	<img src="<?php echo "$upload_dir".$upload_adhaar?>" style="height: 150px;width: 250px">
          	Uploaded Adhaar Card
          	</div>
          	<div class="col-lg-3 col-md-3 col-sm-3">
          		
          	<img src="<?php echo "$upload_dir".$upload_dl?>" style="height: 150px;width: 250px">
          	Uploaded DL Card 
          	</div>
          	<div class="col-lg-3 col-md-3 col-sm-3">
          		
          	<img src="<?php echo "$upload_dir".$upload_rc?>" style="height: 150px;width: 250px">
          	Uploaded RC Card 
          	</div>
          	<div class="col-lg-3 col-md-3 col-sm-3">
          		
          	<img src="<?php echo "$upload_dir".$upload_other?>" style="height: 150px;width: 250px">
          	Uploaded Other Document 
          	</div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php }?>
<?php include('layouts/footer.php');?>