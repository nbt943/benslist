<?php

require_once('config.php');

// ============================================================
// Utility functions
// ============================================================
function json_error($msg) {
    return json_encode([
        "error" => [
            "message" => $msg,
        ],
    ]);
}



// ====================================================================
// Step 1: Make sure we received correct parameters from the frontend
// ====================================================================

//if ($_SERVER['HTTP_CONTENT_TYPE'] !== 'application/json') {
   // header(400);
   // die(json_error("Only JSON requests allowed"));
//}


$json_obj = json_decode(file_get_contents('php://input'));
if (!$json_obj) {
    die(json_error("Could not parse JSON request"));
}

// We expect the frontend to send an object like this:
// {
//   payment_method_id: "pm_123…",
//   firstname: "customer first name",
//   lastname: "customer last name",
//   email: "customer email"
// }
//
// Let's verify that all of that data is present before continuing.
//
if (!isset($json_obj->payment_method_id)) {
    die(json_error("No payment_method_id provided"));
}
else if (!isset($json_obj->firstname)) {
    die(json_error("No firstname provided"));
}
else if (!isset($json_obj->lastname)) {
    die(json_error("No lastname provided"));
}
else if (!isset($json_obj->email)) {
    die(json_error("No lastname provided"));
}


//session_start();

// TODO: here you want to check that the user is logged in, etc
if (!isset($_SESSION["cart_total"])) {
    die(json_error("Please add something to your cart."));
}

// ====================================================================
// Step 2: Create or update customer
// ====================================================================

$customer = null;

if (isset($_SESSION['customer_id'])) {
    // Customer already exists, update

    $customer = \Stripe\Customer::update(
        $_SESSION['customer_id'],
        [
            'email' => $json_obj->email,
            'metadata' => [
                'firstname' => $json_obj->firstname,
                'lastname' => $json_obj->lastname,
                'user_id' => $_SESSION['user_id'],
            ],
        ]
    );
}
else {
    // Customer doesn't exist yet, create

    $customer = \Stripe\Customer::create([
        'email' => $json_obj->email,
        'metadata' => [
            'firstname' => $json_obj->firstname,
            'lastname' => $json_obj->lastname,
            'user_id' => $_SESSION['user_id'],
        ],
    ]);
    $_SESSION['customer_id'] = $customer->id;
}

if ($customer === null) {
    die(json_error("Error creating or updating customer"));
}


// ====================================================================
// Step 3: Determine final price
// ====================================================================

// TODO: In your application, calculate the total price from the session
//  and database, like you do now in charge.php

// TODO: calculate total price from session and database
$Total = $_SESSION["cart_total"];

// TODO: fetch from database
$ProductName = "Example Product";



// ====================================================================
// Step 4: Create PaymentIntent and confirm
// ====================================================================

$metadata = [
    "first_name" => $json_obj->firstname,
    "last_name" => $json_obj->lastname,
    "product_name" => $ProductName,
];

$intent = \Stripe\PaymentIntent::create([
    'payment_method' => $json_obj->payment_method_id,
    'amount' => $Total,
    'currency' => 'usd',
    'customer' => $customer,
    'metadata' => $metadata,
    'confirmation_method' => 'manual',
    'confirm' => true,
]);

$_SESSION['payment_intent_id'] = $intent->id;

if ($intent->status == 'requires_action' &&
    $intent->next_action->type == 'use_stripe_sdk') {
    # Tell the client to handle the action
    echo json_encode([
        'requires_action' => true,
        'payment_intent_client_secret' => $intent->client_secret
    ]);
} else if ($intent->status == 'succeeded') {
    # The payment didn’t need any additional actions and completed!
    # Handle post-payment fulfillment
    echo json_encode([
        'success' => true
    ]);
} else {
    # Invalid status
    http_response_code(500);
    echo json_encode(['error' => 'Invalid PaymentIntent status']);
}
