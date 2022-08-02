<?php

namespace App\User\Infrastructure\Register;

use App\User\Domain\Exceptions\UserNotFoundException;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\User;
use App\User\Domain\UserEmail;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Log\LoggerInterface;

class UserRepositoryMySQL implements UserRepository
{

    private readonly EntityRepository $entityRepository;

    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ){
        $this->entityRepository = $this->entityManager->getRepository(User::class);
    }

    public function register(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->entityManager->clear();
    }

    public function findByUserEmail(UserEmail $userEmail): User
    {

        $user = $this->entityRepository->findOneBy(['email.value' => $userEmail->value()]);

        if(!$user){
            throw new UserNotFoundException($userEmail->value());
        }

        return $user;
    }
}