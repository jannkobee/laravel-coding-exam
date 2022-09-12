<?php

namespace App\Repositories;

use App\Models\User;


class UserRepository
{
    public function all()
    {
        return User::with('roles')
            ->get()
            ->map(function ($user) {
                return $this->format($user);
            });
    }

    protected function format($user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'role' => $user->roles->rolename,
        ];
    }
}
