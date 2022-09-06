<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use Hash;
use Throwable;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $data = Auth::user();

        return view('dashboard');
    }

    public function getData()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $data = Auth::user();

        $id = $data->id;

        $return = DB::table('users as use')
            ->where('use.id', '=', $id)
            ->join('roles as rol', 'use.role', '=', 'rol.id')
            ->select('use.id', 'use.name', 'use.email', 'use.role', 'rol.rolename', 'rol.description')
            ->get();

        return $return;
    }

    public function getAllData()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $users = DB::table('users as use')
            ->join('roles as rol', 'use.role', '=', 'rol.id')
            ->select('use.id', 'use.name', 'use.email', 'rol.rolename')
            ->get();

        $roles = DB::table('roles')->get();

        return [$users, $roles];
    }

    public function storeRole(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            DB::beginTransaction();
            $return = DB::table('roles')->insert([
                'rolename' => $request->name,
                'description' => $request->description,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' =>  \Carbon\Carbon::now(),
            ]);
            DB::commit();
            return $return;
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function storeUser(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8',
            'role' => 'required|min:1',
        ]);

        $data = $request->all();

        $return = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);

        return $return;
    }

    public function updateRole(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            DB::beginTransaction();
            $return = DB::table('roles')
                ->where('id', $request->id)
                ->update(
                    [
                        'rolename' => $request->name,
                        'description' => $request->description,
                        'updated_at' => \Carbon\Carbon::now()
                    ]
                );
            DB::commit();
            return $return;
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function updateUser(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            DB::beginTransaction();
            $return = DB::table('users')
                ->where('id', $request->id)
                ->update(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'role' => $request->role,
                        'updated_at' => \Carbon\Carbon::now()
                    ]
                );
            DB::commit();
            return $return;
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function deleteRole(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        try {
            DB::beginTransaction();
            $return = DB::table('roles')->where('id', $request->id)->delete();
            DB::commit();
            return $return;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function deleteUser(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        try {
            DB::beginTransaction();
            $return = DB::table('users')->where('id', $request->id)->delete();
            DB::commit();
            return $return;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
