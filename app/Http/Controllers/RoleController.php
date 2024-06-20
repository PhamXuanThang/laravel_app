<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\AddUserRoleRequest;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Services\Contracts\RoleServiceInterface;

class RoleController extends Controller
{
    public function __construct(private RoleServiceInterface $roleService)
    {
    }

    public function index(): mixed
    {
        $result = $this->roleService->index();

        return $this->successResponse($result);
    }

    public function create(CreateRoleRequest $request): mixed
    {
        $result = $this->roleService->create($request);

        return $this->successResponse($result);
    }

    public function detail(string $id): mixed
    {
        $result = $this->roleService->detail($id);

        return $this->successResponse($result);
    }

    public function update(string $id, CreateRoleRequest $request)
    {
        $result = $this->roleService->update($id, $request);

        return $this->successResponse($result);
    }

    public function delete(string $id)
    {
        $result = $this->roleService->delete($id);

        return $this->successResponse($result);
    }

    public function listUsers(string $id)
    {
        $result = $this->roleService->listUsers($id);

        return $this->successResponse($result);
    }

    public function detachUsers(string $id, AddUserRoleRequest $request): mixed
    {
        $result = $this->roleService->detachUser($id, $request);

        return $this->successResponse($result);
    }

    public function syncUsers(string $id, AddUserRoleRequest $request): mixed
    {
        $result = $this->roleService->syncUser($id, $request);

        return $this->successResponse($result);
    }
}