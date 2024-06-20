<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

/**
 * @property string $email
 * @property string $password
 */
class LoginUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): mixed
    {
        return [
            'email' => ['required', 'email', 'max:120',],
            'password' => ['required', 'min:8', 'max:32', 'string'],
        ];
    }

    /**
     * Function messages handle message response
     *
     * @return array
     * **/
    public function messages(): array
    {
        return [];
    }
}