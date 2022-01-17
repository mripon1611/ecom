@extends('master')
@section('title',"Cart")

@section('content')

<?php
  use App\Http\Controllers\OrderController;
  $total = 0;
  if(Session::has('user')) {
    $total = OrderController::orderItem();
  }
  
?>

<div class="p-5 m-5">
    <h3>My Order</h3>
    <br><br>
    <div class="p-5">
        @if($total === 0)
            <h4>No order Found!!</h4>
        @else
            @foreach($products as $product)
                <a href="detail/{{$product->id}}">
                    <div class="trending-items">
                        <img class="trending-image" src="{{$product->gallery}}" alt="">
                        <div class="">
                            <h3>{{$product->name}}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif


    </div>
    
</div>

@endsection