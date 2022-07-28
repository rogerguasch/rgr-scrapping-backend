<?php

namespace App\User\Infrastructure\Register;

use App\User\Domain\Repository\UserRegisterRepository;
use App\User\Domain\User;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class UserRepositoryMySQL implements UserRegisterRepository
{

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly EntityManagerInterface $entityManager
    ){
    }

    public function register(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->entityManager->clear();

        $this->logger->alert('infraaaaaaaaaaaaaaaaaaaaaaaaaaaaaa+++++++++++++++++++++++++++++');
        dump($user);
    }
}