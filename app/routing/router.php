<?php

use app\routing\routeDispatcher;

$router = new AltoRouter();

require_once "admin_route.php";
require_once "user_route.php";
$router->setBasePath("/E-commerce/public");

$router->map(method:"GET",route:"/",target:"app\controllers\IndexController@show",name:"Home Route");
$router->map(method:"POST",route:"/cart",target:"app\controllers\IndexController@cart",name:"Cart Route");
$router->map(method:"GET",route:"/cart",target:"app\controllers\IndexController@showCart",name:"Show Cart Route");
$router->map(method:"POST",route:"/payout",target:"app\controllers\IndexController@payout",name:"Payout Route");
$router->map(method:"GET",route:"/product/[i:id]/detail",target:"app\controllers\IndexController@productDetail",name:"Product Detail Route");

$router->map(method:"POST",route:"/payment/stripe", target:"app\controllers\PaymentController@stripePayment",name:"Stripe Payment Route");


new routeDispatcher($router);


//$match = $router->match();
// if($match){
//     echo "<pre>". print_r($match,true). "</pre>";
// }else{
//     echo "Not match";
// }

?>