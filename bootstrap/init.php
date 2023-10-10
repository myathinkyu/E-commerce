<?php

use  app\classes\database;

if(!isset($_SESSION)) session_start();

define("APP_ROOT",realpath(__DIR__."/../"));
define("URL_ROOT","http://localhost/E-commerce/public/");

require_once APP_ROOT . "/vendor/autoload.php";

require_once APP_ROOT . "/app/config/_env.php";

new database;

require_once APP_ROOT . "/app/routing/router.php";

?>