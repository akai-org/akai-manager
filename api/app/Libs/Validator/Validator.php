<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 20.03.19
 * Time: 06:20
 */

namespace App\Libs\Validator;


abstract class Validator
{
    protected $errors = [];
    protected $requestData;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    public function validateRequest()
    {
        $this->checkRequest();
        $this->throwException();
    }

    abstract protected function checkRequest();

    public function isGiven(string $name, string $message)
    {
        if(!key_exists($name, $this->requestData)){
            $this->errors[$name] = $message;
        }
    }

    private function throwException()
    {
        if (!empty($this->errors)) {
            throw new ValidationException($this->errors);
        }
    }
}