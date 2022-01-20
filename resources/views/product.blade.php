@extends('master')
@section('title',"Product Home")

@section('content')

<div class="container custom-product">

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach($products as $product)

                <div class="carousel-item {{$product['id']==1?'active':''}} text-center" data-bs-interval="10000">
                    <img src="{{$product['gallery']}}" class="d-block w-100" alt="Chania" height='670px'>
                    <div>
                        <h3>{{$product['name']}}</h3>
                        <p>{{$product['description']}}</p>
                    </div>
                </div>

            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
</div>

<div class="container">
    <div class="trending-wrapper">
        <h3>Trending Products</h3>
        <div class="row">
            <div class="col-sm-4">
                @foreach($products as $product)
                    <a href="detail/{{$product['id']}}">
                        <div class="trending-items">
                            <img class="trending-image" src="{{$product['gallery']}}" alt="">
                            <div class="">
                                <h3>{{$product['name']}}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        
    </div>
</div>

@endsection