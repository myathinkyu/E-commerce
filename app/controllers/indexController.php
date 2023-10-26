<?php

namespace app\controllers;

use app\classes\CSRFtoken;
use app\models\Product;
use app\classes\request;
use app\classes\session;


class indexController extends baseController
{
    public function show()
    {    
        $count = Product::all()->count();
        list($prods, $pages) = paginate(4, $count, new Product());
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
            $product->qty = 1;
            array_push($carts, $product);
        }

        echo json_encode($carts);
        exit;
    }

    public function payout()
    {
        $post = Request::get('post');
        $ary = [];
        foreach($post->items as $item) {
            $str = "item id " . $item->id . " qty " . $item->qty . " price ". $item->price;
            array_push($ary, $str);
        }
        echo json_encode($ary);
        exit;
        // if(CSRFtoken::checkToken($post->token)){
        //     if($this->saveOrder($post->items)){
        //         echo "Success";
        //         exit;
        //     }else{
        //         echo "Product Save Fail!";
        //         exit;
        //     }
        // }else{
        //     echo "Token Mis Match Error!";
        //     exit; 
        // }
    }

    public function saveOrder($orders)
    {
        $order = serialize($orders);
        return true;
    }

    public function showCart()
    {
        view('cart');
    }

    public function productDetail($id)
    {
        $product = Product::where("id",$id)->first();
        return view('product', compact('product'));
    }
}







?>