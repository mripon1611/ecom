@extends('master')
@section('title',"Login")

@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4">
            <form action="/login" method="POST">

                @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif

                @csrf()
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputEmail3" name="email" placeholder="abc@gmail.com">
                    </div>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="********">
                    </div>
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection