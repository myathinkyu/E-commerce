<?php

use app\routing\routeDispatcher;

$router = new AltoRouter();

$router->setBasePath("/E-commerce/public");

$router->map(method:"GET",route:"/",target:"app\controllers\IndexController@show",name:"Home Route");

//admin route
$router->map(method:"GET",route:"/admin",target:"app\controllers\AdminController@index",name:"Admin Home");
$router->map(method:"GET",route:"/admin/category/create",target:"app\controllers\CategoryController@index",name:"Category Create");

$router->map(method:"POST",route:"/admin/category/create",target:"app\controllers\CategoryController@store",name:"Category Store");

$match = $router->match();

// if($match){
//     echo "<pre>". print_r($match,true). "</pre>";
// }else{
//     echo "Not match";
// }

new routeDispatcher($router);



?>