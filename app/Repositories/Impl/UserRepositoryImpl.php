<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository
{

    function getAll()
    {
        return User::orderBy('created_at', 'DESC')
            ->get();
    }

    function create(array $userDetail, array $roles)
    {
        $user = new User($userDetail);
        $user->save();
        $user->roles()->attach($roles);
        $user->save();
        return $user;
    }

    function update(int $userId, array $userDetail, $roles)
    {
        $user = User::find($userId);
        $user->name = $userDetail['name'];
        $user->email = $userDetail['email'];
        $user->roles()->sync($roles);
        $user->save();
        return $user;
    }

    function delete(int $userId): void
    {
        throw new \Exception("Method not implemented");
    }

    function updatePassword(int $id, string $password)
    {
        $user = User::find($id);
        $user->password = $password;
        $user->save();

        return $user;
    }
}
