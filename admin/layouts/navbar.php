<?php
include_once('../connection.php');
$email=$_SESSION['email'];

?>
  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
  
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class=" dropdown user-menu dark-primary">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <img src="dist/img/user1.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $email?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div  class="dropdown-header " style="background: #6c757d" >

                <p style="color: white;">
                <?php echo $email;?> <br>
                Administrator
                  
                </p>

          </div>
          <div class="dropdown-footer">

                <!--<a href="#" class="btn btn-info btn-flat ">Profile</a>-->
                <a  href="logout.php" class="btn btn-danger btn-flat">Sign out</a>
          </div>

          
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->