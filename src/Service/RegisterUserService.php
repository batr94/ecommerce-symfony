<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\RegisterUserDTO;

final class RegisterUserService
{
  public function __construct(
    private readonly CreateSiteUserService $createSiteUserService
  ) {
  }

  public function register(RegisterUserDTO $registerUserDTO): void
  {
    $this->createSiteUserService->create(
      $registerUserDTO->emailAddress,
      $registerUserDTO->phoneNumber,
      $registerUserDTO->password,
    );
  }
}