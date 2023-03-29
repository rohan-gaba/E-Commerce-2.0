<?php
require_once('vendor/autoload.php');
// \Stripe\Stripe::setApiKey();
\Stripe\Stripe::setApiKey('  sk_test_51MqqhISE31RGAaWwr54RzS3FtAFHTUjAdYx88pDaNiuI7c6j7VEhlguJtgcNRSNg388HsznHq0ocOwsFtNuTuHuR00FzQyNPJy');
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
  'amount' => $_POST['amount'] * 100,
  'currency' => 'inr',
  'source' => $token,
  'description' => 'Example charge'
]);

if ($charge->status == 'succeeded') {
    echo "Payment successful, redirect or display success message";
  } else {
    echo "Payment failed, display error message";
  }


  
