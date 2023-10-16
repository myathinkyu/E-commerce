<?php

// require_once "../app/config/_env.php";
// echo getenv("APP_DEVELOPER");
// echo "<br>" . getenv("APP_ENV");

//use illuminate\database\capsule\manager as capsule;

// use app\classes\Mail;
use app\classes\session;
use Illuminate\Contracts\Session\Session as SessionSession;

require_once "../bootstrap/init.php";

$con = session::has("name");
var_dump($con);

//session::add("name","mori");
//session::remove("name");
//echo $_SESSION["name"];

// $mailer = new Mail;
// $content = "Many PHP developers need to send email from their code. The only PHP function that supports this directly is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.";
// $data = [
//     "to" => "minhtut2123@gmail.com",
//     "to_name" => "MinHtutOo",
//     "content" => $content,
//     "subject" => "New Mail Testing For E-commerce Project",
//     "filename" => "welcome",
//     "img_link" => "https://images.unsplash.com/photo-1611658871778-30c12b88bd25?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHRpbnklMjBmbG93ZXJ8ZW58MHx8MHx8fDA%3D&w=1000&q=80"
// ];



// if($mailer->send($data))
// {
//     echo "<br><h3>Mail Send Successfully!</h3>";
// }else{
//     echo "<br><h3>Mail Send Fail!</h3>";
// }










// $user = capsule::table("users")->where("id",1)->get();
// echo "<pre>". print_r($user,true) . "</pre>";

//$var = "BaseController@show";
//list($controller,$method) = explode("@",$var);
// echo "Controller is " . $controller;
// echo "<br>Method is " . $method;
?>