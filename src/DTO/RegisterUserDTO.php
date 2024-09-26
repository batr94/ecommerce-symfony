<?php

declare(strict_types=1);

use Symfony\Component\Validator\Constraints as Assert;

final class RegisterUserDTO
{
  #[Assert\Email(message: 'Invalid email')]
  private string $emailAddress;

  #[Assert\PasswordStrength]
  private string $password;

  #[Assert\EqualTo(propertyPath: 'password')]
  private string $comparePassword;
}