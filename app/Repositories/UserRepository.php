<?php

namespace App\Repositories;

interface UserRepository {
    function getAllUser(?string $key); 
    function createUser(array $userDetail);
    function updateUser(int $userId, array $userDetail);
    function deleteUser(int $userId): void;
}