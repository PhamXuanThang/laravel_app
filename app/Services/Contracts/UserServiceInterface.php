<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface UserServiceInterface
{
    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function create(Request $request): mixed;

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request): mixed;

    /**
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request): mixed;

    /**
     * @param Request $request
     * @return mixed
     */
    public function detail(Request $request): mixed;
}