<?php

namespace App\User\UI\Controllers;

use App\User\Application\Register\RegisterUserUseCase;
use App\User\Application\Register\Request\RegisterUserRequest;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserPostController extends AbstractController
{

    public function __construct(
        private readonly RegisterUserUseCase $registerUserUseCase,
        private readonly LoggerInterface $logger
    ){
    }

    public function __invoke()
    {

        $name = 'name';
        $email = 'email';
        $registerUserRequest = new RegisterUserRequest($name,$email);
        $this->logger->info('RegisterUserPostController *******************************');

        $this->registerUserUseCase->__invoke($registerUserRequest);

        return new Response('',Response::HTTP_CREATED);

    }

}