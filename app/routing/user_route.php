<?php

$router->map(method:"GET",route:"/user/login",target:"app\controllers\userController@showLoginForm",name:"User Login Form");
$router->map(method:"POST",route:"/user/login",target:"app\controllers\userController@login",name:"User Login");
$router->map(method:"GET",route:"/user/register",target:"app\controllers\userController@showRegisterForm",name:"User Register Form");
$router->map(method:"POST",route:"/user/register",target:"app\controllers\userController@register",name:"User Register");
$router->map(method:"GET",route:"/user/logout",target:"app\controllers\userController@logout",name:"User Logout");
