<?php

namespace App\Http\Requests;

use App\Exceptions\ValidateException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    /**
     * failedValidation
     *
     * @param Validator $validator
     * @return void
     * @throws ValidateException
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();
        throw new ValidateException($errors);
    }
}
