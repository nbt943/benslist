<?php 
// print_r($user_id);die;
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . "/config.php";

$_SESSION["cart_total"] = $stripe_plan[0]['price']*100;
$_SESSION["user_id"] = $user_id;

?>
<style>
body {line-height: 2rem; font-family: sans-serif;}
#card-errors {color: orange;}
#card-field {background: #fff;}
label{display: block;}
form{max-width: 400px; background: #eee; padding: 2rem;}
</style>

<div class="stripe-payment">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <div class="widget mt-4">
                    <div class="stripe-heading text-center">
                        <h2>CHECKOUT CONFIRMATION</h2>
                        <h3>PAY $ <?php echo $stripe_plan[0]['price']; ?></h3>
                    </div>
                    <?= form_open('charge',['id'=>'payment-form','method'=>'POST']); ?> 
                        <div class="form-group">
                            <?= form_label('First Name *', 'firstname',['class'=>'control-label']); ?> 
                            <?= form_input(['type'=>'text','name'=>'firstname','placeholder'=>'First Name','class'=>'form-control','id'=>'firstname'] ) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Last Name *', 'lastname',['class'=>'control-label']); ?>
                            <?= form_input(['type'=>'text','name'=>'lastname','placeholder'=>'Last Name','class'=>'form-control','id'=>'lastname'] ) ?>   
                        </div>
                        <div class="form-group">
                            <?= form_label('Email *', 'email',['class'=>'control-label']); ?> 
                            <?= form_input(['type'=>'email','name'=>'email','placeholder'=>'Email','class'=>'form-control','id'=>'email'] ) ?>
                        </div>
                        <div class="form-group"> 
                            <?= form_label('Card Number *', 'card_number',['class'=>'control-label']); ?> 
                            <div id="card-field"></div>
                            <span id="card-errors"></span>
                        </div>
                        <div class="form-group text-center">
                            <?= form_input(['type'=>'submit','value'=>'Complete Order','class'=>'btn btn-primary'] ) ?>
                            <br><span id="payment-errors"></span>
                        </div>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
const config = {
    publishable_key: "<?= config('publishable_key') ?>",
};

let stripe = Stripe(config.publishable_key);
let elements = stripe.elements();
let card = elements.create("card");

card.mount("#card-field");

let form = document.getElementById('payment-form');
let errors = document.getElementById('card-errors');

form.addEventListener('submit', function(evt){
    evt.preventDefault();
    stripe.createPaymentMethod('card', card).then(function(result) {
        if (result.error) {
            errors.textContent = result.error.message;
            return;
        }
        errors.textContent = "";

        fetch('https://nextinfosoft.com/benslist/create-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                payment_method_id: result.paymentMethod.id,
                email: document.getElementById('email').value,
                firstname: document.getElementById('firstname').value,
                lastname: document.getElementById('lastname').value,
            })
        })
        .then(function(responseBody) {
            return responseBody.json()
        })
        .then(handleServerResponse);
    });
});

function handleServerResponse(response) {
    if (response.error) {
        document.getElementById("payment-errors").textContent = response.error.message;
    } else if (response.requires_action) {
        document.getElementById("payment-errors").textContent = "Requires action";
        // Use Stripe.js to handle required card action
        handleAction(response);
    } else {
        document.getElementById("payment-errors").textContent = "Success!";
        document.getElementById("payment-form").submit();
    }
}

function handleAction(response) {
    stripe.handleCardAction(
        response.payment_intent_client_secret
    ).then(function(result) {
        if (result.error) {
            document.getElementById("payment-errors").textContent = result.error.message;
        } else {
            // The card action has been handled
            // The PaymentIntent can be confirmed again on the server
            fetch('confirm_payment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    payment_intent_id: result.paymentIntent.id,
                })
            }).then(function(confirmResult) {
                return confirmResult.json();
            }).then(handleServerResponse);
        }
    });
}
</script>

<style>
    #payment-form
    {
        background-color: #fff;
        padding: 2rem 0 2rem;
    }
    .stripe-heading h2,.stripe-heading h3{
        color: #2a63aa;
        font-weight: bold;
    }
</style>