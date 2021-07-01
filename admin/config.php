<?php
require ('../stripe-php-master/init.php');
$publishableKey = "pk_test_51J85HlSJXep5Rn71LLESzSh9b35mWl65NsLmIxDbVM1i0rxWEgBW6nDP6cVVyZ0smWlNGJ3Ad2N8H9skMcKwNKpP00kS6RqbMu";
$secretKey = "sk_test_51J85HlSJXep5Rn71lgpEozbfPyWxvCavX4ikWUeNZoR6kwulJrZlEDFQsDk1g4xdMeLXzWHJJC3PsI8Qg1Dwpa3f00kCHs2S48";

\Stripe\Stripe::setApiKey($secretKey);
?>