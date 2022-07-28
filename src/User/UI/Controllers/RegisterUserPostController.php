<?php

namespace App\User\UI\Controllers;

use App\User\Application\Register\RegisterUserUseCase;
use App\User\Application\Register\Request\RegisterUserRequest;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Uid\Uuid;

class RegisterUserPostController extends AbstractController
{

    public function __construct(
        private readonly RegisterUserUseCase $registerUserUseCase,
        private readonly LoggerInterface $logger
    ){
    }

    public function __invoke(): Response
    {

        $id = Uuid::v4()->toRfc4122();
        $name = 'name';
        $email = 'email@email.com';
        $registerUserRequest = new RegisterUserRequest($id, $name,$email);
        $this->logger->info('RegisterUserPostController *******************************');

        $this->registerUserUseCase->__invoke($registerUserRequest);

        return new Response('',Response::HTTP_CREATED);

    }

}