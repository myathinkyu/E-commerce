<?php

namespace app\controllers;

use app\classes\CSRFtoken;
use app\classes\redirect;
use app\classes\request;
use app\classes\session;
use app\classes\updateFile;
use app\classes\validateRequest;
use app\models\category;

class categoryController extends baseController
{
    public function index()
    {
        //redirect::to("/E-commerce/public/");
        $cates = Category::all()->count();
        list($cats,$pages) = paginate(3, $cates, new category());
        $cats = json_decode(json_encode($cats));
        view("admin/category/create", compact('cats', 'pages'));
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
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "categories"]
            ];

            $validator = new validateRequest;
            $validator -> checkValidate($post, $rules);

            if($validator->hasError()){
                $cats = Category::all();
                $errors = $validator->getErrors();
                view("admin/category/create", compact('cats', 'errors' ));
            }else{
                $slug = slug($post->name);

                $con = category::create([
                    "name" => $post->name,
                    "slug" => $slug
                ]);

                if($con){
                    $cats = Category::all();
                    $success = "Category created successfully!";
                    view("admin/category/create", compact('cats', 'success'));
                }else{
                    echo "fail";
                }

                // $category = new category();
                // $category->name = $post->name;
                // $category->slug = $slug;

                // if($category->save()){
                //     echo "Category creation success!";
                // }else{
                //     echo "Category creation fail!";
                // }
            }

            // beautify(request::all());
            // echo "<hr>";
            // $uploadFile = new updateFile();
            // var_dump($uploadFile->move(request::get("file")));
        }else{
            session::flash("error","CSRF field Error!");
            redirect::back("");
        }
    }

    public function delete($id)
    {
        $con = category::destroy($id);

        if($con){
            session::flash("delete_success","Category Delete Successfully!");
            redirect::to("/E-commerce/public/admin/category/create");
        }else{
            session::flash("delete_fail","Category Delete fail!");
            redirect::to("/E-commerce/public/admin/category/create");
        }
    }
}





?>