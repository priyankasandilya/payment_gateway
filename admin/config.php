<?php
require ('../stripe-php-master/init.php');
$publishableKey = "XXXXX";
$secretKey = "XXXXXXX";

\Stripe\Stripe::setApiKey($secretKey);
?>