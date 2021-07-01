<?php

// date_default_timezone_set('Asia/Kolkata');
// $con=mysqli_connect('localhost','root','','art_decals');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'artdecal_db');

$con = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("Not connected");
$con->set_charset("utf8");
date_default_timezone_set("asia/calcutta");
?>