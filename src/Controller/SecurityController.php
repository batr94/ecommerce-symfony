<?php

namespace App\Controller;

use App\Service\RegisterUserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\SecurityBundle\Security;
use App\DTO\RegisterUserDTO;

#[Route('/api/security', name: 'app_security_')]
class SecurityController extends AbstractController
{
    #[Route('/registration', methods: ['POST'], name: 'registration')]
    public function registration(
        #[MapRequestPayload] RegisterUserDTO $registerUserDTO,
        RegisterUserService $registerUserService
    ): Response {
        $registerUserService->register($registerUserDTO);

        return new Response(null, Response::HTTP_CREATED);
    }

    #[Route('/logout', methods: ['GET'], name: 'logout')]
    public function logout(Security $security): Response
    {
        $security->logout(false);

        return new Response(null, Response::HTTP_OK);
    }
}
