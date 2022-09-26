<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAddRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $data = $this->roleRepository->getAllRoles();
        return view('roles.index', compact('data'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(RoleAddRequest $request)
    {
        $roleDetail = $request->only([
            'role'
        ]);

        $this->roleRepository->createRole($roleDetail);

        return redirect()->back()->with('success', 'Berhasil menambah role');
    }
}
