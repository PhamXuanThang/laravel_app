<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $confirm_password
 */
class CreateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): mixed
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:120', 'unique:users'],
            'password' => ['required', 'min:8', 'max:32', 'string'],
            'confirm_password' => ['same:password', 'required']
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