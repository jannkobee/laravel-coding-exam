<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware;
use Throwable;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function log(Request $request)
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $return = Auth::attempt($request->only('email', 'password'));

        return $return;
    }
}
