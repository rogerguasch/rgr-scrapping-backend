<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController
{

    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function number(int $max): Response
    {
        $number = random_int(0, $max);
        $this->logger->critical('I just got the logger');
        $this->logger->alert('aaaaaaaaaalerta');

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}