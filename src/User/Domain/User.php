<?php

namespace App\User\Domain;

class User
{
    public function __construct(
     private readonly string $name,
     private readonly string $email,
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