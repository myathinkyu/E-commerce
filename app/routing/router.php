<?php

use app\routing\routeDispatcher;

$router = new AltoRouter();

$router->setBasePath("/E-commerce/public");

$router->map(method:"GET",route:"/",target:"app\controllers\IndexController@show",name:"Home Route");
$router->map(method:"POST",route:"/cart",target:"app\controllers\IndexController@cart",name:"Cart Route");
$router->map(method:"GET",route:"/cart",target:"app\controllers\IndexController@showCart",name:"Show Cart Route");

//admin route
$router->map(method:"GET",route:"/admin",target:"app\controllers\AdminController@index",name:"Admin Home");

$router->map(method:"GET",route:"/admin/category/create",target:"app\controllers\CategoryController@index",name:"Category Create");
$router->map(method:"POST",route:"/admin/category/create",target:"app\controllers\CategoryController@store",name:"Category Store");
$router->map(method:"GET",route:"/admin/category/[i:id]/delete",target:"app\controllers\CategoryController@delete",name:"Category Delete");
$router->map(method:"POST",route:"/admin/category/update",target:"app\controllers\CategoryController@update",name:"Category Update");

$router->map(method:"POST",route:"/admin/subcategory/create",target:"app\controllers\subCategoryController@store",name:"Sub Category Create");
$router->map(method:"POST",route:"/admin/subcategory/update",target:"app\controllers\subCategoryController@update",name:"Sub Category Update");
$router->map(method:"GET",route:"/admin/subcategory/[i:id]/delete",target:"app\controllers\subCategoryController@delete",name:"Sub Category Delete");

$router->map(method:"GET",route:"/admin/product/home",target:"app\controllers\ProductController@home",name:"Product Home");
$router->map(method:"GET",route:"/admin/product/create",target:"app\controllers\ProductController@create",name:"Product Create");
$router->map(method:"POST",route:"/admin/product/create",target:"app\controllers\ProductController@store",name:"Product Store");
$router->map(method:"GET",route:"/admin/product/[i:id]/edit",target:"app\controllers\ProductController@edit",name:"Product Edit");
$router->map(method:"POST",route:"/admin/product/[i:id]/edit",target:"app\controllers\ProductController@update",name:"Product Update");
$router->map(method:"GET",route:"/admin/product/[i:id]/delete",target:"app\controllers\ProductController@delete",name:"Product Delete");

$match = $router->match();

// if($match){
//     echo "<pre>". print_r($match,true). "</pre>";
// }else{
//     echo "Not match";
// }

new routeDispatcher($router);



?>