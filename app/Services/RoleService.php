<?php

namespace App\Services;

use App\Http\Requests\RoleAddRequest;
use App\Models\Role;

interface RoleService {
    function add(RoleAddRequest $request): Role;
    function update(RoleAddRequest $request): Role;
    function delete(int $id): void;
}