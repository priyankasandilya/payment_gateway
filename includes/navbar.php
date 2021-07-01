
    <div class="site-header">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default navbar-toggleable-md navbar-static-top">
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
                             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <?php
                    if(isset($_SESSION['customer_email'])){
                     $customer_email  = $_SESSION['customer_email'];

                     echo "
                          <li><a href='.php'>My Account </a></li>
                          <li><a href='addtocart.php'>Shopping Cart</a></li>
                          <li><a href='logout.php'>logout</a></li>

                ";
                    }
                    else{
                        echo "<li><a href='login.php'>Login</a></li>
                         <li><a href='login.php'>Register</a></li>";
                    }


                ?>
                <!--<li><a href="#">Login</a></li>-->
                <!--<li><a href="#">Register</a></li>-->
                <!--<li class="divider"></li>-->
                <!--<li><a href="#">Log out</a></li>-->
                
                       </ul>
                    </div>
                </nav>         
            </div>
        </div>
    </div> <!-- .site-header -->
