<?php 
session_start();
include_once('connection.php');
$upload_dir = 'admin/uploads/product/';
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
  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
    body{
    margin-top:20px;
    background:#eee;
}


.product-content {
    border: 1px solid #dfe5e9;
    margin-bottom: 20px;
    margin-top: 12px;
    background: #fff
}

.product-content .carousel-control.left {
    margin-left: 0
}

.product-content .product-image {
    background-color: #fff;
    /* display: block; */
    min-height: 238px;
    overflow: hidden;
    position: relative
}

.product-content .product-deatil {
    border-bottom: 1px solid #dfe5e9;
    padding-bottom: 17px;
    padding-left: 16px;
    padding-top: 16px;
    position: relative;
    background: #fff
}

.product-content .product-deatil h5 a {
    color: #2f383d;
    font-size: 15px;
    line-height: 19px;
    text-decoration: none;
    padding-left: 0;
    margin-left: 0
}

.product-content .product-deatil h5 a span {
    color: #9aa7af;
    display: block;
    font-size: 13px
}

.product-content .product-deatil span.tag1 {
    border-radius: 50%;
    color: #fff;
    font-size: 15px;
    height: 50px;
    padding: 13px 0;
    position: absolute;
    right: 10px;
    text-align: center;
    top: 10px;
    width: 50px
}

.product-content .product-deatil span.sale {
    background-color: #21c2f8
}

.product-content .product-deatil span.discount {
    background-color: #71e134
}

.product-content .product-deatil span.hot {
    background-color: #fa9442
}

.product-content .description {
    font-size: 12.5px;
    line-height: 20px;
    padding: 10px 14px 16px 19px;
    background: #fff
}

.product-content .product-info {
    padding: 11px 19px 10px 20px
}

.product-content .product-info a.add-to-cart {
    color: #2f383d;
    font-size: 13px;
    padding-left: 16px
}

.product-content name.a {
    padding: 5px 10px;
    margin-left: 16px
}

.product-info.smart-form .btn {
    padding: 6px 12px;
    margin-left: 12px;
    margin-top: -10px
}

.product-entry .product-deatil {
    border-bottom: 1px solid #dfe5e9;
    padding-bottom: 17px;
    padding-left: 16px;
    padding-top: 16px;
    position: relative
}

.product-entry .product-deatil h5 a {
    color: #2f383d;
    font-size: 15px;
    line-height: 19px;
    text-decoration: none
}

.product-entry .product-deatil h5 a span {
    color: #9aa7af;
    display: block;
    font-size: 13px
}

.load-more-btn {
    background-color: #21c2f8;
    border-bottom: 2px solid #037ca5;
    border-radius: 2px;
    border-top: 2px solid #0cf;
    margin-top: 20px;
    padding: 9px 0;
    width: 100%
}

.product-block .product-deatil p.price-container span,
.product-content .product-deatil p.price-container span,
.product-entry .product-deatil p.price-container span,
.shipping table tbody tr td p.price-container span,
.shopping-items table tbody tr td p.price-container span {
    color: #21c2f8;
    font-family: Lato, sans-serif;
    font-size: 24px;
    line-height: 20px
}

.product-info.smart-form .rating label {
    margin-top: 0
}

.product-wrap .product-image span.tag2 {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    padding: 10px 0;
    color: #fff;
    font-size: 11px;
    text-align: center
}

.product-wrap .product-image span.sale {
    background-color: #57889c
}

.product-wrap .product-image span.hot {
    background-color: #a90329
}

.shop-btn {
    position: relative
}

.shop-btn>span {
    background: #a90329;
    display: inline-block;
    font-size: 10px;
    box-shadow: inset 1px 1px 0 rgba(0, 0, 0, .1), inset 0 -1px 0 rgba(0, 0, 0, .07);
    font-weight: 700;
    border-radius: 50%;
    padding: 2px 4px 3px!important;
    text-align: center;
    line-height: normal;
    width: 19px;
    top: -7px;
    left: -7px
}

.description-tabs {
    padding: 30px 0 5px!important
}

.description-tabs .tab-content {
    padding: 10px 0
}

.product-deatil {
    padding: 30px 30px 50px
}

.product-deatil hr+.description-tabs {
    padding: 0 0 5px!important
}

.product-deatil .carousel-control.left,
.product-deatil .carousel-control.right {
    background: none!important
}

.product-deatil .glyphicon {
    color: #3276b1
}

.product-deatil .product-image {
    border-right: none!important
}

.product-deatil .name {
    margin-top: 0;
    margin-bottom: 0
}

.product-deatil .name small {
    display: block
}

.product-deatil .name a {
    margin-left: 0
}

.product-deatil .price-container {
    font-size: 24px;
    margin: 0;
    font-weight: 300
}

.product-deatil .price-container small {
    font-size: 12px
}

.product-deatil .fa-2x {
    font-size: 16px!important
}

.product-deatil .fa-2x>h5 {
    font-size: 12px;
    margin: 0
}

.product-deatil .fa-2x+a,
.product-deatil .fa-2x+a+a {
    font-size: 13px
}

.profile-message ul {
  list-style: none ;  
}

.product-deatil .certified {
    margin-top: 10px
}

.product-deatil .certified ul {
    padding-left: 0
}

.product-deatil .certified ul li:not(first-child) {
    margin-left: -3px
}

.product-deatil .certified ul li {
    display: inline-block;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    padding: 13px 19px
}

.product-deatil .certified ul li:first-child {
    border-right: none
}

.product-deatil .certified ul li a {
    text-align: left;
    font-size: 12px;
    color: #6d7a83;
    line-height: 16px;
    text-decoration: none
}

.product-deatil .certified ul li a span {
    display: block;
    color: #21c2f8;
    font-size: 13px;
    font-weight: 700;
    text-align: center
}

.product-deatil .message-text {
    width: calc(100% - 70px)
}

 @media only screen and (min-width:1024px) {
    .product-content div[class*=col-md-4] {
        padding-right: 0
    }
    .product-content div[class*=col-md-8] {
        padding: 0 13px 0 0
    }
    .product-wrap div[class*=col-md-5] {
        padding-right: 0
    }
    .product-wrap div[class*=col-md-7] {
        padding: 0 13px 0 0
    }
    .product-content .product-image {
        border-right: 1px solid #dfe5e9
    }
    .product-content .product-info {
        position: relative
    }
} 

.message img.online {
    width:40px;
    height:40px;
}
    </style>

</head>
<body>
   

    <!-- HEADER -->
    <div class="site-header">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default navbar-static-top">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-menu">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo.png"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                           <li><a href="contact.php">Contact</a></li> 
                            <li><a href="reviews.php">Reviews</a></li>
                            <li><a href="login.php">My Acount</a></li>
                        

                        </ul>
                    </div>
                </nav>         
            </div>
        </div>
    </div> <!-- .site-header -->
<?php 
if (isset($_GET['p_id']))

{
$p_id = $_GET['p_id'];
?>


    <div class="page-h">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3><a href="index.php">Gallery</a></h3>
                </div>
            </div>
        </div>
    </div>
    
    

    
  <div class="container-fluid">
      
<?php 
    $query1 = mysqli_query( $con,"SELECT `id`, `product_name`, `cat_id`, `price`, `images`, `description`, `isAvailable`, `created_date` FROM `product` WHERE `id`='$p_id'");

    if (mysqli_num_rows($query1) > 0) {
     
      while ($row = mysqli_fetch_array($query1)) 
        {
      ?>   
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="item active">
                                <img src="<?php echo $upload_dir.$row['images'];?>" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 2 -->
                            <!--<div class="item">-->
                            <!--    <img src="images/dolphin.png" class="img-responsive" alt="" />-->
                            <!--</div>-->
                            <!-- Slide 3 -->
                            <!--<div class="item">-->
                            <!--    <img src="images/dog.png" class="img-responsive" alt="" />-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
<form action="cart_action.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h3><?php echo $row['product_name']?></h3>
                <!--<h2 class="name">-->
                    
                <!--    <small>Product by <a href="javascript:void(0);">Adeline</a></small>-->
                <!--    <i class="fa fa-star fa-2x text-primary"></i>-->
                <!--    <i class="fa fa-star fa-2x text-primary"></i>-->
                <!--    <i class="fa fa-star fa-2x text-primary"></i>-->
                <!--    <i class="fa fa-star fa-2x text-primary"></i>-->
                <!--    <i class="fa fa-star fa-2x text-muted"></i>-->
                <!--    <span class="fa fa-2x"><h5>(109) Votes</h5></span>-->
                <!--    <a href="javascript:void(0);">109 customer reviews</a>-->
                <!--</h2>-->
                <hr />
                <h3 class="price-container">
                    $<?php echo $row['price']?>
                    <small>*includes tax</small>
                </h3>
                
                    <input type="hidden" id="td" value="<?php echo $row['id']?>" name="product_id" >
                    <input type="hidden" id="price" value="<?php echo $row['price']?>" name="pro_price">
                    
                    
                <div class="form-group">
                    <label for="exampleFormControlSelect1"> Your Product will be on:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="product_on" style="width:50%" required>
                        <option value="">Select Option</option>
                      <option value="Magnetic Sheet">Magnetic Sheet</option>
                      <option value="Fibre glass">Fibre glass</option>
                      <option value="Transfer tape only">Transfer tape only</option>
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1"> Desired Size:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="size" style="width:50%" required>
                      <option value="">Select Option</option>
                      <option value="A4">A4</option>
                      <option value="A3">A3</option>
                      <option value="A2">A2</option>
                      <option value="A1">A1</option>
                    </select>
                  </div>
                <div class="certified">
                    
                    <ul>
                        <li>
                            <a href="javascript:void(0);">Delivery time<span>Upto 2 Weeks</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Certified<span>Quality Assured</span></a>
                        </li>
                       
                    </ul>
                </div>
                <hr />
                
                <div class="description description-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br />
                            <strong>Description Title</strong>
                            <p>
                                <?php echo $row['description'];?>
                                <!--Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue-->
                                <!--sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec.-->
                            </p>
                        </div>
                        
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <!--<a href="addtocart.php" class="btn btn-success btn-lg">Add to cart ($<?php echo $row['price'];?>)</a>-->
                           <button type="submit" class="btn btn-success btn-lg" name="add_cart">add to cart ($<?php echo $row['price'];?>)</button>
                        <!--type="submit" class="button btn-block desc-para" name="add_cart"-->
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-group pull-right">
                             <button type="Upload Photo" class="main-button" name="send_message">Upload Photo </button>
                           
                            <!--<button class="btn btn-white btn-default"> Upload Photo</button>-->
                            <!-- <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Add Reviews</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- end product -->
</div>
<?php }}?>


<?php }?>

    <!-- <div class="fourth-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>NEW PRODUCT PROMOTION ?</h2>
                    <a href="contact.html">(BE THERE RIGHT NOW)</a>
                </div>
            </div>
        </div>
    </div> -->

    
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
                         <p><a href="termsandconditions.html">Terms and Conditions</a> | <a href="privacyandpolicy.html">Privacy and Policy</a></p>
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