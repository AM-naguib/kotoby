<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function DashboardloginPage(){
        return view("dashboard.login");
    }



    public function create(){
        return view("front.login");
    }

    public function store(Request $request){
        $data = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if(auth()->attempt($data)){
            return redirect()->route("dashboard.index");
        }

        return back()->with("error", "Invalid username or password");
    }


    public function logout (){
        auth()->logout();
        return redirect()->route("login.create");
    }
}
