<?php

namespace App\User\Application\Register;

use App\User\Application\Register\Request\RegisterUserRequest;
use App\User\Domain\Repository\UserRegisterRepository;
use App\User\Domain\User;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;
use App\User\Domain\UserName;
use Psr\Log\LoggerInterface;

class RegisterUserUseCase
{
    public function __construct(
        private readonly UserRegisterRepository $userRegisterRepository
    ){
    }

    public function __invoke(RegisterUserRequest $registerUserRequest)
    {
        $user = new User(
            new UserId($registerUserRequest->id()),
            new UserName($registerUserRequest->name()),
            new UserEmail($registerUserRequest->email())
        );

        $this->userRegisterRepository->register($user);
    }
}