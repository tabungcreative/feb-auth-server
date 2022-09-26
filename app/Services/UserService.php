<?php

namespace App\Services;

use App\Http\Requests\UserRoleAddRequest;

interface UserService {
    function addUserRole(UserRoleAddRequest $request);
}