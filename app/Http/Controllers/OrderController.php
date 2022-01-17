<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    //
    public function orderNow() {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->sum('products.price');

        return view('order', ['total'=>$total]);
    }

    public function confirmOrder(Request $req) {
        $req->validate([
            'address'=>'required',
        ]);
        $userId = Session::get('user')['id'];
        // return $req->payment;
        $cartAllData = Cart::where('user_id', $userId)->get();
        foreach( $cartAllData as $cartdata) {
            $order = new Order;
            $order->product_id = $cartdata['product_id'];
            $order->user_id = $cartdata['user_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        return redirect('order-view');
    }

    public function myOrder() {
        $userId = Session::get('user')['id'];
        $products = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id', $userId)
        ->select('products.*', 'orders.id as orders_id')
        ->get();

        return view('order-view', ['products'=>$products]);
    }

    static function orderItem() {
        $userId = Session::get('user')['id'];
        return Order::where('user_id', $userId)->count();
    }
}
