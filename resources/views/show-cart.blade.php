@extends('master')
@section('title',"Cart")

@section('content')

<div class="p-5 m-5">
    <h3>My Cart</h3>
    @foreach($products as $product)
    
    <div class="p-5">
        <img class="trending-image" src="{{$product->gallery}}" alt="">
        <div class="">
            <h3>{{$product->name}}</h3>
        </div>
    </div>
    <button class="btn btn-success">Buy Now</button>
    <button class="btn btn-danger">Delete</button>
        
    @endforeach
</div>

@endsection