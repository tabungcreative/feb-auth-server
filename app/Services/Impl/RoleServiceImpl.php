<?php

namespace App\Services\Impl;

use App\Http\Requests\RoleAddRequest;
use App\Models\Role;
use App\Services\RoleService;

class RoleServiceImpl implements RoleService {
    function add(RoleAddRequest $request): Role
    {
        $roleName = $request->input('role');

        $role = new Role();
        $role->role = $roleName;
        $role->save();

        return new Role();
    }   

    function update(RoleAddRequest $request): Role
    {
        return new Role();
    } 

    function delete(int $id): void
    {
        
    }
}