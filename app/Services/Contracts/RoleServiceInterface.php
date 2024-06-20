<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface RoleServiceInterface
{
    /**
     * @return mixed
     */
    public function index(): mixed;

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function create(Request $request): mixed;

    /**
     * @param string $id
     * @return mixed
     */
    public function detail(string $id): mixed;

    /**
     * @param string $id
     * @param Request $request
     * @return mixed
     */
    public function update(string $id, Request $request): mixed;

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id): mixed;

    /**
     * @param string $id
     * @return mixed
     */
    public function listUsers(string $id): mixed;

    /**
     * @param string $id
     * @param Request $request
     * @return mixed
     */
    public function detachUser(string $id, Request $request): mixed;

    /**
     * @param string $id
     * @param Request $request
     * @return mixed
     */
    public function syncUser(string $id, request $request): mixed;
}