<?php

namespace app\controllers;

use app\classes\CSRFtoken;
use app\classes\redirect;
use app\classes\request;
use app\classes\uploadFile;
use app\classes\validateRequest;
use app\models\category;
use app\models\Product;
use app\models\SubCategory;
use app\classes\session;

class ProductController 
{
    public function home()
    {
        $pds = Product::all();
        list($products, $pages) = paginate(4, count($pds), new Product());
        $products = json_decode(json_encode($products));
        view("admin/product/home",compact('products', 'pages'));
    }

    public function create()
    {
        $cats = Category::all();
        $sub_cats = Subcategory::all();
        view("admin/product/create", compact('cats', 'sub_cats'));
    }

    public function store()
    {
        $post = request::get('post');
        $file = request::get('file');

        if(CSRFtoken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "products"],
                "description" => ["required" => true, "minLength" => "20"],
            ];

            $validator = new validateRequest;
            $validator -> checkValidate($post, $rules);

            if($validator->hasError()){
                $errors = $validator->getErrors();
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
            }else{
                if(!empty($file->file->name)){
                    $uploadfile = new uploadFile;
                    if($uploadfile->move($file)){
                        $path = $uploadfile->getPath();

                        $product = new Product();
                        $product->name = $post->name;
                        $product->price = $post->price;
                        $product->cat_id = $post->cat_id;
                        $product->sub_cat_id = $post->sub_cat_id;
                        $product->description = $post->description;
                        $product->image = $path;
                        
                        if($product->save()){
                            $products = Product::all();
                            Session::flash("product_insert_success","Product successfully created!");
                            redirect::to("/E-commerce/public/admin/product/home",compact('products'));
                        }else{
                            $errors = ["Problem Insert Product to Database!"];
                            $cats = Category::all();
                            $sub_cats = SubCategory::all();
                            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                        }
                       
                    }else {
                        $errors = ["Please Check Image size and type!"];
                        $cats = Category::all();
                        $sub_cats = SubCategory::all();
                        view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                    }
                }else{
                    $errors = ["Please Support Image File!"];
                    $cats = Category::all();
                    $sub_cats = SubCategory::all();
                    view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                }
            }

        }else{
            $errors = ["Token Mis Match Error!"];
            $cats = Category::all();
            $sub_cats = Subcategory::all();
            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
        }
    }
}









?>