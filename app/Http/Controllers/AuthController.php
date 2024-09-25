<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function DashboardloginPage(){
        return view("dashboard.login");
    }



    public function create(){
        dd("create");
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
}
