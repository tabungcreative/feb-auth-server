<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository {

    function getAllUser(?string $key)
    {
        if ($key == null) {
            return User::orderBy('created_at', 'DESC')
            ->paginate(10);
        }
        return User::orderBy('created_at', 'DESC')
            ->where('name', 'like', '%'.$key.'%')
            ->paginate(10);
    }
    
    function createUser(array $userDetail)
    {
        return User::create($userDetail);
    }
    
    function updateUser(int $userId, array $userDetail)
    {
        throw new \Exception("Method not implemented");
    }
    
    function deleteUser(int $userId): void
    {
        throw new \Exception("Method not implemented");
    }
        
}