@extends('master')
@section('title',"Cart")

@section('content')

<div class="p-5 m-5">
    <h3>My Cart</h3>
    <br><br>
    
    <a href="/order-now" class="btn btn-success">Order Now</a>
    <hr>
    <br><br>
    @foreach($products as $product)
    
    <div class="p-5">
        <img class="trending-image" src="{{$product->gallery}}" alt="">
        <div class="">
            <h3>{{$product->name}}</h3>
        </div>
    </div>
    <a href="/delete-from-cart/{{$product->cart_id}}" class="btn btn-warning">Remove from Cart</a>
        
    @endforeach
    <br><br>
    <hr>
    <a href="/order-now" class="btn btn-success">Order Now</a>
</div>

@endsection