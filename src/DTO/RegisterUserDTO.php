<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class RegisterUserDTO
{
  public function __construct(
    #[Assert\Email(message: 'Invalid email')]
    public string $emailAddress,
    public string $phoneNumber,
    #[Assert\PasswordStrength(minScore: Assert\PasswordStrength::STRENGTH_WEAK)]
    public string $password,
  ) {
  }
}