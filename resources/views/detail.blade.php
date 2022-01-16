@extends('master')
@section('title',"Product Home")

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="details-img" src="{{$detail['gallery']}}" alt="">

        </div>
        <div class="col-sm-6 pt-5">
            <h2>{{$detail['name']}}</h2>
            <h3>Price: {{$detail['price']}}</h3>
            <h4>Description: {{$detail['description']}}</h4>
            <h4>Category: {{$detail['category']}}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf()
                <input type="hidden" name="product_id" value={{$detail['id']}}>
                <button class="btn btn-warning">Add to Cart</button>
            </form>
            <br><br>
            <button class="btn btn-success" type="submit">Buy Now</button>
            
        </div>
    </div>

    
</div>

@endsection