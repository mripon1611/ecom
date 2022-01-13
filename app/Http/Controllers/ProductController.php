<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    //

    public function index() {
        if(Session()->has('user')){
            $products = Product::all();
            return view('product', ['products'=>$products]);
        } else {
            return redirect('login')->with('fail', 'You must Login first!');
        }
        
    }

    public function detail($id) {
        $detail = Product::find($id);
        return view('detail', ['detail'=>$detail]);
    }
}
