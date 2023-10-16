<?php

namespace app\controllers;

use app\classes\request;

class categoryController extends baseController
{
    public function index()
    {
        view("admin/category/create");
    }

    public function store()
    {
        beautify(Request::old("post","name"));
        beautify($_POST);
        beautify(request::all(true));
        beautify(request::get("file"));
        beautify(request::has("get"));
    }
}





?>