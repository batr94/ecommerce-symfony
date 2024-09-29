<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use App\DTO\RegisterUserDTO;

#[Route('/security', name: 'app_security_')]
class SecurityController extends AbstractController
{
    #[Route('/registration', methods: ['POST'], name: 'registration')]
    public function registration(
        #[MapRequestPayload] RegisterUserDTO $registerUserDTO
    ): JsonResponse {
        return $this->json([
            'message' => 'Hello',
            'path' => 'src/Controller/SecurityController.php',
        ]);
    }
}
