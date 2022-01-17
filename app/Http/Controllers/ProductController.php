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

class ProductController extends Controller
{
    //

    public function index() {
        $products = Product::all();
        return view('product', ['products'=>$products]);
        
    }

    public function detail($id) {
        $detail = Product::find($id);
        return view('detail', ['detail'=>$detail]);
    }

    public function addToCart(Request $req) {
        if(Session()->has('user')){
            $cart = new Cart;
            $cart->user_id = Session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
            // return $id;
        } else {
            return redirect('login')->with('fail', 'You must Login first!');
        }
        
    }

    static function cartItem() {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function showCart() {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('show-cart', ['products'=>$products]);
    }
    public function deleteFromCart($id) {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('show-cart');
    }

    
 
}
