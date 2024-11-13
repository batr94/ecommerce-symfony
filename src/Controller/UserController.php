<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\AddUserAddressDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/user', 'app_user_')]
final class UserController extends AbstractController
{
    #[Route('/address', methods: ['POST'], name: 'add_address')]
    public function addAddress(
        #[MapRequestPayload()] AddUserAddressDTO $addUserAddressDTO
    ): Response {
        dd($addUserAddressDTO);
    }
}