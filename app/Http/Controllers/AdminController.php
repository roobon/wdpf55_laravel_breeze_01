<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;





class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $user = $request->all();
       //dd($user);
      
        if(Auth::guard('admin')->attempt(['email'=> $user['email'], 'password'=> $user['password']])){
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.login');
        }

        
    }
}
