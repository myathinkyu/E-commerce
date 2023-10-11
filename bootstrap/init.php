<?php

use  app\classes\database;
use app\classes\errorHandler;


if(!isset($_SESSION)) session_start();

define("APP_ROOT",realpath(__DIR__."/../"));
define("URL_ROOT","http://localhost/E-commerce/public");

require_once APP_ROOT . "/vendor/autoload.php";

new errorHandler;

require_once APP_ROOT . "/app/config/_env.php";

new database;

require_once APP_ROOT . "/app/routing/router.php";

set_error_handler([new ErrorHandler(), 'handleErrors']);
?>