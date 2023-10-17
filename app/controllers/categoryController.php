<?php

namespace app\controllers;

use app\classes\CSRFtoken;
use app\classes\redirect;
use app\classes\request;
use app\classes\session;
use app\classes\updateFile;
use app\models\category;

class categoryController extends baseController
{
    public function index()
    {
        //redirect::to("/E-commerce/public/");
        $cats = Category::all();
        //beautify($cats);
        view("admin/category/create", compact('cats'));
    }

    public function store()
    {
        // beautify(Request::old("post","name"));
        // beautify($_POST);
        // beautify(request::all(true));
        // beautify(request::get("file"));
        // beautify(request::has("get"));
        // beautify(request::all());
        // beautify(request::get("post")->token);

        $post = request::get("post");
        if(CSRFtoken::checkToken($post->token))
        {
            beautify(request::all());
            echo "<hr>";
            // $uploadFile = new updateFile();
            // var_dump($uploadFile->move(request::get("file")));
        }else{
            session::flash("error","CSRF field Error!");
            redirect::back("");
        }
    }
}





?>