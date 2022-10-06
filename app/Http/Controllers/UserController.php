<?php

namespace App\Http\Controllers;

use App\Exceptions\UserPasswordNotSame;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserCreatePassword;
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
            abort(500);
        }
    }

    public function generatePassword($id)
    {
        try {
            $user = $this->userService->generatePassword($id);
            return redirect()->route('user.index')->with([
                'success' => 'Password Berhasil dibuat',
                'password-show' => true,
                'user' => $user
            ]);
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function createPassword(UserCreatePassword $request, $id)
    {
        try {
            $this->userService->createPassword($request, $id);
            return redirect()->route('user.index')->with([
                'success' => 'Password Berhasil dibuat',
            ]);
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function changePassword(UserChangePasswordRequest $request, $id)
    {
        try {
            $this->userService->changePassword($id, $request);
            return redirect()->route('user.index')->with([
                'success' => 'Password Berhasil dibuat',
            ]);
        } catch (UserPasswordNotSame $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            abort(500);
        }
    }
}
