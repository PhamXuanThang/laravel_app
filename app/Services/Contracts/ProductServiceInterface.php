<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function getList(): mixed;
    public function create(Request $request): mixed;
    public function show(int $id): mixed;
    public function edit(Request $request): mixed;
    public function delete(int $id): mixed;
}