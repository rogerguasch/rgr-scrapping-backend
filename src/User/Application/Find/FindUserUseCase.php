<?php

namespace App\User\Application\Find;

use App\User\Application\Find\Request\FindUserRequest;
use App\User\Application\Find\Response\FindUserResponse;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;

class FindUserUseCase
{
    public function __construct(
        private readonly UserRepository $userRepository
    ){
    }

    public function __invoke(FindUserRequest $findUserRequest): FindUserResponse
    {
        $userEmail = new UserEmail($findUserRequest->email());

        $user = $this->userRepository->findByUserEmail($userEmail);

        return new FindUserResponse($user);
    }
}