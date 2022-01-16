<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserControllerRepository;

use Validator;

class UserController extends Controller
{
    //
    protected $data;
    public function __construct(UserControllerRepository $data) {
        $this->data = $data;
    }

    public function login( Request $req) {
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|max:18|min:6',
        ]);

        $response = $this->data->signin($req->all());
        if($response === 'emailerror') {
            return back()->with('fail', 'Email is not recognized!!');
        }
        else if($response === 'passerror') {
            return back()->with('fail', 'Incorrect Password!!');
        }
        else {
            $req->session()->put('user', ['email'=>$req->email,'password'=>$req->password]);
            return redirect('/');
        }
    }
}
