<?php

namespace App\Repositories;

interface UserRepository
{
    function getAll();
    function create(array $userDetail, array $roles);
    function update(int $userId, array $userDetail, $roles);
    function delete(int $userId);
    function updatePassword(int $id, string $password);
}
