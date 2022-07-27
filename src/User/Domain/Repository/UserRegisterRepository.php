<?php

namespace App\User\Domain\Repository;

use App\User\Domain\User;

interface UserRegisterRepository
{
    public function register(User $user): void;
}