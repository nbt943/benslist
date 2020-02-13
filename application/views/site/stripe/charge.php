<?php

require_once('config.php');

// ==============================================================
// Final step: finalize the order in your database, show receipt
// ==============================================================

$intent = \Stripe\PaymentIntent::retrieve($_SESSION['payment_intent_id']);

if ($intent->status !== 'succeeded') {
    die("Final order step reached, but PaymentIntent status is '{$intent->status}'");
}
// TODO: update your database now that the PaymentIntent is complete and your customer has paid

// TODO: demo only: reset the session
$_SESSION['customer_id'] = null;
$_SESSION['payment_intent_id'] = null;

?>

<h2>Order complete</h2>

<pre>
<?php 
 print_r($intent); 
?>
 