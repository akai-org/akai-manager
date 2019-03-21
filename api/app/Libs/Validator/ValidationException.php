<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 14.03.19
 * Time: 23:18
 */

namespace App\Libs\Validator;


use Exception;

class ValidationException extends Exception
{
    public $errors;
    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct("Podane dane są nieprawidłowe", 422);
    }
}