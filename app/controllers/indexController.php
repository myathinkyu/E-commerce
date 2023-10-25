<?php

namespace app\controllers;

use app\models\Product;
use app\classes\request;
use app\classes\session;


class indexController extends baseController
{
    public function show()
    {    
        $count = Product::all()->count();
        list($prods, $pages) = paginate(6, $count, new Product());
        $products = json_decode(json_encode($prods));
        $featured = Product::where("featured",2)->get();
        view("home", compact('products', 'pages', 'featured'));
    }

    public function cart()
    {
        $post = Request::get('post');
        $items = $post->cart;
        $carts = [];

        foreach($items as $item){
            $product = Product::where("id", $item)->first();
            array_push($carts, $product);
        }

        echo json_encode($carts);
        exit;
    }

    public function showCart()
    {
        view('cart');
    }
}







?>