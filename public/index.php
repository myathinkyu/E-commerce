<?php

// require_once "../app/config/_env.php";
// echo getenv("APP_DEVELOPER");
// echo "<br>" . getenv("APP_ENV");

//use illuminate\database\capsule\manager as capsule;

// use app\classes\Mail;
use app\classes\session;
use app\classes\validateRequest;
//use Illuminate\Contracts\Session\Session as SessionSession;

require_once "../bootstrap/init.php";

//paginate(5, 10, "categories", new \app\controllers\categoryController());


// $post = [
//     "name" => "Mg Mg$",
//     "age" => 2,
//     "email" => "tester@gmail.com"
// ];

// $policy = [
//     "name" => ["string" => true, "minLength" => "5"],
//     "age" => ["number" => true, "minLength" => "2"],
//     "email" => ["email" => true, "maxLength" => "25"]
// ];

// $validator = new validateRequest;
// $validator -> checkValidate($post, $policy);

// if($validator->hasError()){
//     beautify($validator->getErrors());
// }else{
//     echo "good to go";
// }

//$con = $validator->unique("name", "tester2", "users");
//$con = $validator->required("name", "", "users");
// $con = $validator->minLength("email", "abngnjhjub", "9");
// $con = $validator->maxLength("email", "abng", "9");
// $con = $validator->email("email", "glory@gmail.com", "9");
// $con = $validator->string("email", "glorygmailcom", "9");
// $con = $validator->number("email", "45678", "9");
// $con = $validator->mixed("email", "glory2@gmail.com", "9");
// var_dump($con);


// $con = session::has("name");
// var_dump($con);

//session::add("name","mori");
//echo $_SESSION["name"];

//session::remove("token");

//var_dump(session::get("name"));

// session::replace("name","glory");
// echo session::get("name");

//session::flash("create_success","Category created successfully!");
//session::flash("create_success");

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