<?php

$dotEnv = Dotenv\Dotenv::createUnsafeImmutable(APP_ROOT);
$dotEnv->load();

require_once __DIR__ . "/_stripe.php";
?>