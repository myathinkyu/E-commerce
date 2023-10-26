<?php

use app\classes\session;
use  Stripe\Stripe;

$stripe = [
    "secret_key" => getenv("STRIPE_SECRET_KEY"),
    "publishable_key" => getenv("STRIPE_PUBLISHABLE_KEY")
];

session::replace("publishable_key", $stripe["publishable_key"]);
Stripe::setApiKey($stripe["stripe_key"]);
