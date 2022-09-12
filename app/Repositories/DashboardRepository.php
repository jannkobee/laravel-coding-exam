<?php

namespace App\Repositories;

use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class DashboardRepository
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        Auth::user();

        return view('dashboard');
    }

    public function getData()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $data = Auth::user();

        $id = $data->id;

        return User::with('roles')
            ->where('id', $id)
            ->get()
            ->map(function ($data) {
                return $this->userformat($data);
            });
    }

    public function getAllData()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $users = User::with('roles')
            ->get()
            ->map(function ($data) {
                return $this->userformat($data);
            });

        $roles = Roles::get()
            ->map(function ($data) {
                return $this->rolesformat($data);
            });

        return [$users, $roles];
    }

    public function storeRole($request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            Roles::create([
                'rolename' => $request->name,
                'description' => $request->description
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function storeUser($request)
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

    public function updateRole($request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            Roles::where('id', $request->id)
                ->update([
                    'rolename' => $request->name,
                    'description' => $request->description,
                ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function updateUser($request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            User::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteRole($request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        try {
            Roles::where('id', $request->id)
                ->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteUser($request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        try {
            Roles::where('id', $request->id)
                ->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

    protected function userformat($data)
    {
        return [
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email,
            'rolename' => $data->roles->rolename,
        ];
    }

    protected function rolesformat($data)
    {
        return [
            'id' => $data->id,
            'rolename' => $data->rolename,
            'description' => $data->description
        ];
    }
}
