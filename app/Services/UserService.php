<?php

namespace App\Services;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function create(Request $request): mixed
    {
        return $this->userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request): mixed
    {
        $user = $this->userRepository->where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            return 'Incorrect email or password.';
        }
        $token = $user->createToken(Str::random());
        $user['token'] = $token->plainTextToken;

        return $user;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request): mixed
    {
        return $request->user()->currentAccessToken()->delete();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function detail(Request $request): mixed
    {
        return $request->user();
    }
}