<?php
  use App\Http\Controllers\ProductController;
  $total = 0;
  if(Session::has('user')) {
    $total = ProductController::cartItem();
  }
  
?>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">E-com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link float-right" aria-current="page" href="/show-cart">Cart({{$total}})</a>
        </li>
        @if(Session::has('user'))
        <li class="nav-item">
          <a class="nav-link float-right" aria-current="page" href="/logout">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link float-right" aria-current="page" href="/login">Login</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>