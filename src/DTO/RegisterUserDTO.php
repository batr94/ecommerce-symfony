<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\SiteUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity(
  fields: ['emailAddress' => 'email_address'],
  entityClass: SiteUser::class,
  groups: ['Strict'],
)]
#[Assert\GroupSequence(['RegisterUserDTO', 'Strict'])]
final readonly class RegisterUserDTO
{
  /**
   * TODO: Добавить проверку на правильность номера телефона
   */
  public function __construct(
    #[Assert\NotBlank()]
    #[Assert\Email(message: 'Invalid email')]
    public string $emailAddress,
    public string $phoneNumber,
    #[Assert\PasswordStrength(minScore: Assert\PasswordStrength::STRENGTH_WEAK)]
    public string $password,
  ) {
  }
}