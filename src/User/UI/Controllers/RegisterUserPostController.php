<?php

namespace App\User\UI\Controllers;

use App\User\Application\Register\RegisterUserUseCase;
use App\User\Application\Register\Request\RegisterUserRequest;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Uid\Uuid;

class RegisterUserPostController extends AbstractController
{

    public function __construct(
        private readonly RegisterUserUseCase $registerUserUseCase
    ){
    }

    public function __invoke(Request $request): Response
    {
        $body = $request->toArray();

        $registerUserRequest = new RegisterUserRequest(
            Uuid::v4()->toRfc4122(),
            $body['name'],
            $body['email']
        );

        $this->registerUserUseCase->__invoke($registerUserRequest);

        return new Response('',Response::HTTP_CREATED);

    }

}