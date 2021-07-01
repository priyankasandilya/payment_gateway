<?php
session_start();
// session_unset($_SESSION['customer_email']);

// header('Location:login.php');
// exit();
if(session_destroy())
{
	unset($_SESSION['customer_email']);
	header('Location:login.php');
}

?>