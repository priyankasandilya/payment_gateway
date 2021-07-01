<?php
session_start();
include('connection.php');
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

</head>
<body>
   

    <!-- HEADER -->
    
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
    <!--                        <li><a href="login.php">My Acount</a></li>-->
                        

    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </nav>         -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div> -->
    
    <!-- .site-header -->


    <div class="page-h">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Gallery</h3>
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="filter">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="filter-controls controls">
                        <li class="filter active" data-filter="mix">All</li>
                    
                        <li class="filter" data-filter="1">Animal</li>
                        <li class="filter" data-filter="2">Auto/Moto</li>
                        <li class="filter" data-filter="3">Celebrities</li>
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="container">
            <div class="row">
                <div id="Grid">
            <?php
            $sql_new = "SELECT `id`, `product_name`, `cat_id`, `price`, `images`, `description`, `isAvailable`, `created_date` FROM `product` ";
             foreach ($con->query($sql_new) as $row_new) {
            ?>
            
                <div class="mix <?php echo $row_new['cat_id'];?> col-md-3 col-sm-6" >
                    <div class="thumb-p" style="background-color: aliceblue;">
                        <img src="<?php echo "$upload_dir".$row_new['images']; ?>" alt="">
                        <div class="overlay-p">
                            <a href="product_details.php?p_id=<?php echo $row_new['id'];?>" ><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="content-p">
                        <h4> <a href="product_details.php?p_id=<?php echo $row_new['id'];?>"><?php echo $row_new['product_name'];?></a></h4>
                        <span>Creative</span>
                    </div>
                </div>
                
                <?php }?>
                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p" style="background-color: aliceblue;">-->
                <!--        <img src="images/Animals/dog2.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p2.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>New Second</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Jim_Carrey.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p3.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Number Three</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
         
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Jackie_Chan.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p4.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Fourth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/images/Louis_Amstrong.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p4.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Fourth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/images/Muhammad_Ali.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p5.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Active Five</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/images/Uma_Thurman.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p4.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Fourth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/images/tomcruise.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="product_details.html" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Fourth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/images/Richard_Gere_Julia_Roberts.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="product_details.html" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Fourth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-3 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/images/robertdeniro.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="product_details.html" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Fourth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Animals/elephant2.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p6.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Another Six</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Animals/lion.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p7.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>New Seven</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Animals/lynx.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Animals/parrot.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="mix category-1 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/Animals/parrot2.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="mix category-2 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/automoto/ford.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-2 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/automoto/ford.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-2 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/automoto/ford.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-2 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/automoto/ford.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mix category-2 col-md-3 col-sm-6">-->
                <!--    <div class="thumb-p">-->
                <!--        <img src="images/automoto/tesla.png" alt="">-->
                <!--        <div class="overlay-p">-->
                <!--            <a href="images/p8.jpg" data-rel="lightbox"><i class="fa fa-plus"></i></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="content-p">-->
                <!--        <h4>Eighth Item</h4>-->
                <!--        <span>Creative</span>-->
                <!--    </div>-->
                <!--</div>-->
                </div>
            </div>
        </div>
    </div>



    <div class="fourth-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Do you prefer using your own photo?</h2>
                      <button type="file" class="main-button" name="fileToUpload" id="fileToUpload">Upload Photo </button>
                       <form action="upload.php" method="post" enctype="multipart/form-data"> 
<!--<input type="file" name="fileToUpload" id="fileToUpload">-->
<!--<input type="submit" value="Upload Image" name="submit">-->
</form>    
                </div>
            </div>
        </div>
    </div>

   
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                  <img src="images/logo.png" width="200px">
                    </div>
               
                <div class="col-md-3 text-center">
                    <h2>Navigation Menu</h2>
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
        </div>
    </footer>
    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>    
    
</body>
</html>