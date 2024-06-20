<?php

namespace App\Http\Requests\Roles;

use App\Http\Requests\BaseRequest;

/**
 * @property string $sync
 * @property string $user_ids
 */
class AddUserRoleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): mixed
    {
        return [
            'user_ids' => ['nullable', 'array',],
            'user_ids.*' => ['required'],
            'sync' => ['nullable'],
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