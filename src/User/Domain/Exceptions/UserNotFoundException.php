<?php

declare(strict_types=1);

namespace App\User\Domain\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function __construct(string $email)
    {
        parent::__construct(sprintf('User with email %s not found.', $email));
    }
}