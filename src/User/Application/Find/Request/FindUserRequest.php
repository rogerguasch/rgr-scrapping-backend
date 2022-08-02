<?php

namespace App\User\Application\Find\Request;

class FindUserRequest
{
    public function __construct(
        private readonly string $email
    ){
    }

    public function email(): string
    {
        return $this->email;
    }


}