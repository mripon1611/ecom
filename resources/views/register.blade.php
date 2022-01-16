@extends('master')
@section('title',"Registration")

@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4">
            <form action="/register" method="POST">

                @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif

                @csrf()
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control"  name="name" placeholder="Mr. ABC">
                    </div>
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" placeholder="abc@gmail.com">
                    </div>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"  name="password" placeholder="********">
                    </div>
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            already have an account? <a href="/login">login</a>
        </div>
    </div>
</div>

@endsection