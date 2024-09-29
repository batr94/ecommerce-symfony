<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class RegisterUserDTO
{
  public function __construct(
    #[Assert\Email(message: 'Invalid email')]
    public string $emailAddress,
    #[Assert\PasswordStrength]
    public string $password,
    #[Assert\EqualTo(propertyPath: 'password')]
    public string $comparePassword
  ) {
  }
}