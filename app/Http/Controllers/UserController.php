<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userService)
    {
    }

    public function create(CreateUserRequest $request): mixed
    {
        $result = $this->userService->create($request);

        return $this->successResponse($result);
    }

    public function login(LoginUserRequest $request): mixed
    {
        $result = $this->userService->login($request);

        return $this->successResponse($result);
    }

    public function logout(Request $request): mixed
    {
        $result = $this->userService->logout($request);

        return $this->successResponse($result);
    }

    public function detail(Request $request): mixed
    {
        $result = $this->userService->detail($request);

        return $this->successResponse($result);
    }
}