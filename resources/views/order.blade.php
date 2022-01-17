@extends('master')
@section('title',"Orders")

@section('content')
<?php
  use App\Http\Controllers\ProductController;
  $total = 0;
  if(Session::has('user')) {
    $total = ProductController::cartItem();
  }
  
?>

<div class="p-5 m-5">
    <h3>My Orders</h3>
    @if($total === 0)
    <h4>No cart found!!</h4>
    @else

    <table class="table">
        <tbody>
        <tr>
            <td>Amount</td>
            <td>$ {{$total}}</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td>$ 0</td>
        </tr>
        <tr>
            <td>Delevery charge</td>
            <td>$ 5</td>
        </tr>
        <tr>
            <td>Total Amount</td>
            <td>$ {{$total + 5}}</td>
        </tr>
        </tbody>
    </table>

    <form action="/confirm-order" method="POST">
        @csrf()
        <div class="form-group">
            <textarea name="address" id="" cols="100" rows="5" placeholder="Enter your address.."></textarea>
        </div>
        <div class="form-group">
            <label for="">Payment Method</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Card Payment" name="payment" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Card Payment
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" value="Mobile Banking" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Mobile Banking
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" value="Cash on Delevery" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Cash on Delevery
                </label>
            </div>
            <button class="btn btn-success">Confirm</button>
        </div>
    </form>
    @endif
   
</div>

@endsection