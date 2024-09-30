<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view("front.register");
    }

    public function store(Request $request){
        $data = $request->validate([
            "name"=>"required",
            "username"=>"required",
            "email"=>"required|email",
            "password"=>"required|min:6",
        ]);
        $data["password"] = bcrypt($data["password"]);
        $user = User::create($data);
        Auth::login($user);
        return to_route("front.index");
    }
}
