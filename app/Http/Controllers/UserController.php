<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepository $userRepository;
    private RoleRepository $roleRepository;
    private UserService $userService;


    public function __construct(
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        UserService $userService
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $data = $this->userRepository->getAll();

        return view('users.index', compact('data'));
    }

    public function create()
    {
        $role = $this->roleRepository->getAllRoles();
        return view('users.create', compact('role'));
    }

    public function store(UserAddRequest $request)
    {
        try {
            $user = $this->userService->add($request);
            return redirect()->route('user.create')->with([
                'success' => 'User Berhasil dibuat',
                'password-show' => true,
                'user' => $user
            ]);
        } catch (Exception $e) {
            echo 'Terjadi masalah pada server kami' . $e->getMessage();
        }
    }
}
