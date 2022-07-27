<?php

namespace App\User\Infrastructure\Register;

use App\User\Domain\Repository\UserRegisterRepository;
use App\User\Domain\User;
use Psr\Log\LoggerInterface;

class DoctrineRegisterUser implements UserRegisterRepository
{

    public function __construct(
        private readonly LoggerInterface $logger
    ){
    }

    public function register(User $user): void
    {
        $this->logger->alert('infraaaaaaaaaaaaaaaaaaaaaaaaaaaaaa+++++++++++++++++++++++++++++');
    }
}