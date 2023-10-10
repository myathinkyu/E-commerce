<?php

use app\routing\routeDispatcher;

$router = new AltoRouter();

$router->setBasePath("/E-commerce/public");
$router->map(method:"GET",route:"/",target:"app\controllers\IndexController@show",name:"Home Route");

$match = $router->match();

// if($match){
//     echo "<pre>". print_r($match,true). "</pre>";
// }else{
//     echo "Not match";
// }

new routeDispatcher($router);



?>