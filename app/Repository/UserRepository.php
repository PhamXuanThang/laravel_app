<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}