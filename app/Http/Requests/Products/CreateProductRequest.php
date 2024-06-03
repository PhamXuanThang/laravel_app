<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;

/**
 * @property string $name
 * @property string $code
 * @property float $price
 */
class CreateProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): mixed
    {
        return [
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'price' => ['required',],
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