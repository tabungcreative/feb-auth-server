<?php

namespace App\Services\Impl;

use App\Http\Requests\UserAddRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function add(UserAddRequest $request)
    {

        $password = $this->generatePassword(8);

        $passwordHash = Hash::make($password);

        $detailUser = $request->only([
            'name', 'email'
        ]);

        $detailUser['password'] = $passwordHash;

        $roles = $request->input('roles');

        $user = $this->userRepository->create($detailUser, $roles);
        $user->password = $password;

        return $user;
    }

    function generatePassword($size)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $size; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
