<?php

namespace App\Http\Requests\Roles;

use App\Http\Requests\BaseRequest;

/**
 * @property string $title
 * @property string $description
 * @property string $user_ids
 */
class CreateRoleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): mixed
    {
        return [
            'title' => ['required', 'max:255', 'string',],
            'description' => ['required', 'max:255', 'string'],
            'level' => ['required', 'numeric'],
            'user_ids' => ['array', 'nullable',],
            'user_ids.*' => ['required', 'numeric'],
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