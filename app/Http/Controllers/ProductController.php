<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    //

    public function index() {
        // if(Session()->has('user')){
        //     $products = Product::all();
        //     return view('product', ['products'=>$products]);
        // } else {
        //     return redirect('login')->with('fail', 'You must Login first!');
        // }
        $products = Product::all();
        return view('product', ['products'=>$products]);
        
    }

    public function detail($id) {
        $detail = Product::find($id);
        return view('detail', ['detail'=>$detail]);
    }

    public function addToCart(Request $req) {
        if($req->Session()->has('user')){
            $cart = new Cart;
            $cart->user_id = Session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            //$cart->save();
        } else {
            return redirect('login')->with('fail', 'You must Login first!');
        }
        
    }
}
