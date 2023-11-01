<?php

namespace app\controllers;

use app\classes\CSRFtoken;
use app\models\Product;
use app\classes\request;
use app\classes\session;
use app\models\OrderDetail;
use app\classes\auth;
use app\models\Order;
use app\models\Payment;

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
       
        if(CSRFtoken::checkToken($post->token)){
            session::replace("cart-items", $post->items);
            echo "Success";
            exit;
        }else{
            echo "Token Mis Match Error!";
            exit; 
        }
    }

    public function saveItemsToDatabase($status="Pending",$extraData="")
    {
        $items = session::get("cart-items");
        $order_number = uniqid();
        $total = 0;
        
        foreach($items as $item){
            $total += $item->qty * $item->price;
            $od = new OrderDetail;
           
            $od->user_id = Auth::user()->id;
            $od->product_id = $item->id;
            $od->unit_price = $item->price;
            $od->status = $status;
            $od->quantity = $item->qty;
            $od->total = $item->qty* $item->price;
            $od->order_no = $order_number;

            $od->save();
        }

        $order = new Order;
        $order->user_id = auth::user()->id;
        $order->order_no = $order_number;
        $order->order_extra = $extraData;

        $order->save();

        $payment = new Payment();
        $payment->user_id = auth::user()->id;
        $payment->amount = $total;
        $payment->status = $status;
        $payment->order_no = $order_number;

        if($payment->save()){
            return true;
        }else{
            return false;
        }
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