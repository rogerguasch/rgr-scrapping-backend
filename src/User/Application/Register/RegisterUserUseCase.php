<?php

namespace App\User\Application\Register;

use App\Shared\ValueObjects\Uuid;
use App\User\Application\Register\Request\RegisterUserRequest;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\User;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;
use App\User\Domain\UserName;

class RegisterUserUseCase
{
    public function __construct(
        private readonly UserRepository $userRegisterRepository
    ){
    }

    public function __invoke(RegisterUserRequest $registerUserRequest): void
    {
        $user = new User(
            new Uuid($registerUserRequest->id()),
            new UserName($registerUserRequest->name()),
            new UserEmail($registerUserRequest->email())
        );

        $this->userRegisterRepository->register($user);
    }
}