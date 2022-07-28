<?php

namespace App\User\Domain;

class User
{
    public function __construct(
     private readonly UserName $name,
     private readonly UserEmail $email,
    ){
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }


}