<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('sample');
    }

    public function getdata()
    {
        return $this->userRepository->all();
    }
}
