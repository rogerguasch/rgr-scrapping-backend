<?php

namespace App\User\Application\Register\Request;

class RegisterUserRequest
{
    public function __construct(
        private readonly string $name,
        private readonly string $email
    ){
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }


}