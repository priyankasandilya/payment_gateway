<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51Ig35hHo5UAW5gqVD69kM2xCDYKrWplzBq0x5qM0LW4qxIzg7jTItarxn4NRAzO2uQYcFB420X1BsFX74WXB9AaT00pfE47bCG";

$secretKey="sk_test_51Ig35hHo5UAW5gqVXCYlhIVx0blCW0yuSsuJuEMVPJjro2eFblquACM8pd5QIAqmHaHGwue2ZgqyJiVR1HlVh4e900jlel3OQa";

\Stripe\Stripe::setApiKey($secretKey);
?>