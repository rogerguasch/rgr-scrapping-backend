<?php

namespace App\User\Application\Register;

use App\User\Application\Register\Request\RegisterUserRequest;
use App\User\Domain\Repository\UserRegisterRepository;
use App\User\Domain\User;
use Psr\Log\LoggerInterface;

class RegisterUserUseCase
{
    public function __construct(
        private readonly UserRegisterRepository $userRegisterRepository,
        private readonly LoggerInterface $logger
    ){
    }

    public function __invoke(RegisterUserRequest $registerUserRequest)
    {
        $this->logger->error("RegisterUserUseCase -----------------");
        $user = new User(
            $registerUserRequest->name(),
            $registerUserRequest->email()
        );

        $this->userRegisterRepository->register($user);
    }
}