<?php

// require_once "../app/config/_env.php";
// echo getenv("APP_DEVELOPER");
// echo "<br>" . getenv("APP_ENV");

use illuminate\database\capsule\manager as capsule;
require_once "../bootstrap/init.php";

$user = capsule::table("users")->where("id",1)->get();
echo "<pre>". print_r($user,true) . "</pre>";




//$var = "BaseController@show";
//list($controller,$method) = explode("@",$var);
// echo "Controller is " . $controller;
// echo "<br>Method is " . $method;
?>