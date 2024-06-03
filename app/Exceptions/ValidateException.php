<?php

namespace App\Exceptions;

class ValidateException extends BaseException
{

    protected mixed $errors;

    /**
     * __construct
     *
     * @param  mixed $errors
     * @return void
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
        parent::__construct($this->errors);
    }

    /**
     * Get the concise error message if any.
     *
     * @return string|null
     */
    public function getErrorMessage(): mixed
    {
        return $this->errors;
    }

    /**
     * render
     *
     * @return mixed
     */
    public function render(): mixed
    {
        return $this->validateResponse($this->errors);
    }
}
