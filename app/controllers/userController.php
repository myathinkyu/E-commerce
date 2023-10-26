<?php

namespace app\controllers;

use app\classes\auth;
use app\classes\CSRFtoken;
use app\classes\request;
use app\classes\session;
use app\classes\validateRequest;
use app\classes\redirect;
use app\models\User;

class userController
{
    public function showLoginForm()
    {
        if(auth::check()){
            redirect::to("/E-commerce/public/cart");
        }else{
            return view("user/login");
        }
    }

    public function login()
    {
        $post = request::get("post");
        if(CSRFtoken::checkToken($post->token)){
            $user = User::where("email", $post->email)->first();
            if($user){
                if(password_verify($post->password, $user->password)){
                    Session::add("user_id", $user->id);
                    Redirect::to("/E-commerce/public/cart");
                }else{
                    Session::flash("error_message", "Password Error!");
                    Redirect::to("/E-commerce/public/user/login");
                }
            }else{
                Session::flash("error_message", "No user with that email!");
                Redirect::to("/user/login");
            }
        }else{
            Session::flash("error_message", "Token Mis Match Error!");
            Redirect::to("/E-commerce/public/user/login");
        }
    }

    public function showRegisterForm()
    {
        return view("user/register");
    }

    public function register()
    {
        $post = request::get("post");
        if(CSRFtoken::checkToken($post->token)){
            if($post->password === $post->confirm_password){
                $rules = [
                    "name" => ["minlength" => "5"],
                    "email" => ["unique" => "users"],
                    "password" => ["minlength" => "5"],
                ];

                $validator = new validateRequest;
                $validator->checkValidate($post, $rules);

                if($validator->hasError()){
                    beautify($validator->getErrors());
                }else{
                    $user = new User();
                    $user->name = $post->name;
                    $user->email = $post->email;
                    $user->password = password_hash($post->password, PASSWORD_BCRYPT);

                    if($user->save()){
                        Session::flash("success_message", "Register success! Please Login!");
                        redirect::to("/E-commerce/public/user/login");
                    }else{
                        Session::flash("error_message", "Register Fail! Try Again!");
                        redirect::to("/E-commerce/public/user/register");
                    }
                }
            }else{
                Session::flash("error_message", "Password do not match!");
                Redirect::to("/E-commerce/public/user/register");
            }
        }else{
            Session::flash("error_message", "Token Mis Match Error!");
            Redirect::to("/user/register");
        }
    }

    public function logout()
    {
        session::remove("user_id");
        redirect::to("/E-commerce/public/");
    }
}