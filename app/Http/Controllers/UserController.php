<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    //
    public function index(Request $request)
    {
        $key = $request->get('key');
        $data = $this->userRepository->getAllUser($key);

        return view('users.index', compact('data'));
    }
}
