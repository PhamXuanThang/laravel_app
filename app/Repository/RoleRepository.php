<?php

namespace App\Repository;

use App\Models\Roles;
use App\Repository\Contracts\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function model(): string
    {
        return Roles::class;
    }
}