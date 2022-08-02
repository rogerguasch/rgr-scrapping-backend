<?php

namespace App\User\Domain\Repository;

use App\User\Domain\User;
use App\User\Domain\UserEmail;

interface UserRepository
{
    public function register(User $user): void;

    public function findByUserEmail(UserEmail $userEmail): User;
}