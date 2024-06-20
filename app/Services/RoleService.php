<?php

namespace App\Services;

use App\Repository\Contracts\RoleRepositoryInterface;
use App\Services\Contracts\RoleServiceInterface;
use Illuminate\Http\Request;

class RoleService implements RoleServiceInterface
{
    public function __construct(private RoleRepositoryInterface $roleRepository)
    {
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->roleRepository->get();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function create(Request $request): mixed
    {
        $role = $this->roleRepository->create([
            'title' => $request->title,
            'description' => $request->description,
            'level' => $request->level,
        ]);
        $userIds = $request['user_ids'] ? array_unique($request['user_ids']) : null;
        $role->users()->attach($userIds);

        return $role;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function detail(string $id): mixed
    {
        return $this->roleRepository->findOrFail($id);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return mixed
     */
    public function update(string $id, Request $request): mixed
    {
        $role = $this->roleRepository->findOrFail($id);
        $role->update([
            'title' => $request->title,
            'description' => $request->description,
            'level' => $request->level,
        ]);
        $userIds = $request['user_ids'] ? array_unique($request['user_ids']) : [];
        $role->users()->sync($userIds);

        return $role;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id): mixed
    {
        $role = $this->roleRepository->findOrFail($id);

        return $role->delete();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function listUsers(string $id): mixed
    {
        $role = $this->roleRepository->findOrFail($id);

        return $role->with('users')->find($role);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return mixed
     */
    public function detachUser(string $id, Request $request): mixed
    {
        $userIds = $request['user_ids'] ? array_unique($request['user_ids']) : [];
        $role = $this->roleRepository->findOrFail($id);
        $role->users()->detach($userIds);

        return $role->with('users')->find($role);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return mixed
     */
    public function syncUser(string $id, request $request): mixed
    {
        $userIds = $request['user_ids'] ? array_unique($request['user_ids']) : [];
        $role = $this->roleRepository->findOrFail($id);
        $role->users()->syncWithoutDetaching($userIds);

        return $role->with('users')->find($role);
    }
}