<?php

namespace App\Services;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserCreatePassword;

interface UserService
{
    function add(UserAddRequest $request);
    function createPassword(UserCreatePassword $request, int $id);
    function generatePassword(int $id);
    function changePassword(int $id, UserChangePasswordRequest $request);
}
