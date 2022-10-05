<?php

namespace App\Services;

use App\Http\Requests\UserAddRequest;

interface UserService
{
    function add(UserAddRequest $request);
}
