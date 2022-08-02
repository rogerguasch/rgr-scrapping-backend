<?php

namespace App\User\UI\Controllers;

use App\User\Application\Find\FindUserUseCase;
use App\User\Application\Find\Request\FindUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FindUserGetController extends AbstractController
{

    public function __construct(
        private readonly FindUserUseCase $findUserUseCase
    ){
    }

    public function __invoke(Request $request): Response
    {
        $email = $request->get('email');
        $findUserRequest = new FindUserRequest($email);

        $user = $this->findUserUseCase->__invoke($findUserRequest);

        return new JsonResponse($user->toArray(), Response::HTTP_OK);

    }

}