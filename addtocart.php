<?php
session_start();
include('connection.php');
if(!isset($_SESSION['customer_email'])){
   header("Location:login.php");
}
$upload_dir = 'admin/uploads/product/';

?>

<?php
$user_id=$_SESSION['id'];
$sql = "select * from `tbl_user` where id=".$user_id;
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
    $row = mysqli_fetch_assoc($results);
    $customer_name = $row['customer_name'];
    $customer_mobile = $row['customer_mobile'];
    }
?>

<!DOCTYPE html>
 <html class="no-js"> 
<head>
    <meta charset="utf-8">
    <title>Art Decals - Gallery</title>
   <meta name="description" content=" Art Decals the best Stickering on transfer tape (for walls, doors, glass, vehicles, etc.)ﬁbre glass with frame.">
    <meta name="keywords" content="Art Decals the best Stickering on transfer tape (for walls, doors, glass, vehicles, etc.)ﬁbre glass with frame.">
   
    <meta name="viewport" content="width=device-width">
   
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="css/templatemo-style.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
    
    <?php include_once('includes/navbar.php');?>
    <!--<div class="site-header">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <nav class="navbar navbar-default navbar-static-top">-->
    <!--                <div class="navbar-header">-->
    <!--                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-menu">-->
    <!--                        <span class="sr-only">Toggle navigation</span>-->
    <!--                        <i class="fa fa-bars"></i>-->
    <!--                    </button>-->
    <!--                    <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo.png"></a>-->
    <!--                </div>-->
    <!--                <div class="collapse navbar-collapse" id="main-menu">-->
    <!--                    <ul class="nav navbar-nav navbar-right">-->
    <!--                        <li><a href="index.php">Home</a></li>-->
    <!--                        <li><a href="gallery.php">Gallery</a></li>-->
    <!--                       <li><a href="contact.php">Contact</a></li> -->
    <!--                        <li><a href="reviews.php">Reviews</a></li>-->
                            <!-- <li><a href="product_details.html">productdetails</a></li> -->
    <!--                        <li><a href="login.php">My Acount</a></li>-->
                        

    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </nav>         -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div> -->
    
    <div class="page-h">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Add To Cart</h3>
                </div>
            </div>
        </div>
    </div>
<?php
$Rent=0;
    $sql11 = "select * from `tbl_cart` where `user_id`='".$_SESSION['id']."' AND `cart_status`=3";
    $results11 = mysqli_query($con, $sql11);
    if (mysqli_num_rows($results11) > 0) {
      $row11 = mysqli_fetch_assoc($results11);
      
      
    ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                        <th>Product</th>
                        <th>size</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Rent=0;
                        $count=0;
                   $sql = "select c.*,p.* from tbl_cart c INNER JOIN product p on c.pro_id = p.id where `user_id`='".$_SESSION['id']."' and c.cart_status='3' ";
                    
                    foreach ($con->query($sql) as $row) {
                        $Rent +=$row['cart_amount'];

                        ?>
                    <tr>
                        
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo "$upload_dir".$row['images']; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $row['product_name']; ?></a></h4>
                                <h5 class="media-heading"> by <a href="#"><?php echo $row['product_on'];?></a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div>
                        
                        <td><?php echo $row['size'];?></td>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" id="exampleInputEmail1" value="<?php echo $row['qty'];?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $row['price'];?></strong></td>
                        
                        <td class="col-sm-1 col-md-1">
                        <a href="cart_action.php?cart_id=<?php echo $row['pro_id'];?>"><button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></a></td>
                    </tr>
                    <?php }?>
                    <!--<tr>-->
                    <!--    <td class="col-md-6">-->
                    <!--    <div class="media">-->
                    <!--        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/Jean_Reno.png" style="width: 72px; height: 72px;"> </a>-->
                    <!--        <div class="media-body">-->
                    <!--            <h4 class="media-heading"><a href="#">Product name</a></h4>-->
                    <!--            <h5 class="media-heading"> by <a href="#">Brand name</a></h5>-->
                    <!--            <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>-->
                    <!--        </div>-->
                    <!--    </div></td>-->
                    <!--    <td class="col-md-1" style="text-align: center">-->
                    <!--    <input type="email" class="form-control" id="exampleInputEmail1" value="2">-->
                    <!--    </td>-->
                    <!--    <td class="col-md-1 text-center"><strong>$4.99</strong></td>-->
                    <!--    <td class="col-md-1 text-center"><strong>$9.98</strong></td>-->
                    <!--    <td class="col-md-1">-->
                    <!--    <button type="button" class="btn btn-danger">-->
                    <!--        <span class="glyphicon glyphicon-remove"></span> Remove-->
                    <!--    </button></td>-->
                    <!--</tr>-->
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$<?php echo $Rent;?></strong></h5></td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td>   </td>-->
                    <!--    <td>   </td>-->
                    <!--    <td>   </td>-->
                    <!--    <td><h5>Estimated shipping</h5></td>-->
                    <!--    <td class="text-right"><h5><strong>$6.94</strong></h5></td>-->
                    <!--</tr>-->
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="gallery.php" ><button type="button"  class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></a></td>
                        <td>
                       <a href="checkout.php" > <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php }
else{
        echo "<center><a href='index.php'><img src='images/empty-cart.jpg' alt='error' title='cart is empty'></a></center>";
    }
    ?>
<hr>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                  <img src="images/logo.png" width="200px">
                   <h2>Either from gallery pictures or your own photographswe do vinyl decals on</h2>
                </div>
               
                <div class="col-md-3 text-center">
                    <h2>Menus</h2>
                    <ul class="fotter">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact </a></li>
                        <li><a href="reviews.php">Reviews</a></li>
                        
                    </ul>
                   
                </div>
                <div class="col-md-3 text-center">
                    <h2>Contact Us</h2>
                    <ul  class="fotter">
                        <li>7 Pollitt Close
                            S9 3DF<br>
                            Sheffield
                            United Kingdom</li>
                        <li>info@artdecals.co.uk </li>
                        <li>+44 0758 70 52 979</li>
                         
                     </ul>
                </div>
                <div class="col-md-3 text-center">
                    <h2>Social Media Links</h2>
                    <ul class="social">
                        <li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
                        <li class="facebook"><a href="#" class="fa fa-facebook"></a></li>
                        <li class="rss"><a href="#" class="fa fa-rss"></a></li>
                        <li class="linkedin"><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
                   
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                         <p><a href="termsandconditions.php">Terms and Conditions</a> | <a href="privacyandpolicy.php">Privacy and Policy</a></p>
                 </div>
            
               
               <div class="col-md-6">
                   <h3>
                   Copyright &copy; <script type="text/javascript">
                document.write( new Date().getFullYear());
                </script> All Reserved.</h3>
               </div> 
               </div>
        </div>
        </div>
    </footer>
        <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>  
</body>
</html>