<?php

namespace App\User\Application\Find\Response;

use App\User\Domain\User;

class FindUserResponse
{
    public function __construct(
        private readonly User $user
    ){
    }

    public function toArray(): array
    {
        return [
            'id' => $this->user->id()->value(),
            'name' => $this->user->name()->value(),
            'email' => $this->user->email()->value(),
        ];
    }
}