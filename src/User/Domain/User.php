<?php

namespace App\User\Domain;

use App\Shared\ValueObjects\Uuid;

class User
{

    public function __construct(
        private readonly Uuid $id,
        private readonly UserName  $name,
        private readonly UserEmail $email,
    ){
    }

    public function id(): Uuid
    {
        return $this->id;
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