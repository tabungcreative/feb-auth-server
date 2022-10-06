<?php

namespace App\Repositories;

interface UserRepository
{
    function getAll();
    function create(array $userDetail, array $roles);
    function update(int $userId, array $userDetail);
    function delete(int $userId): void;
    function updatePassword(int $id, string $password);
}
