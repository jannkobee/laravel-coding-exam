<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;
use App\Models\User;
use Hash;


class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('register');
    }

    public function getData()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        return [$users, $roles];
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8',
            'role' => 'required|min:1',
        ]);

        $data = $request->all();

        //ELOQUENT
        $return = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);

        //QUERY BUILDER
        // DB::beginTransaction();
        // $return = DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'role' => $request->role
        // ]);
        // DB::commit();
        return $return;
    }
}
