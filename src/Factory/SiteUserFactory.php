<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\SiteUser;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class SiteUserFactory
{
  public function __construct(
    private readonly UserPasswordHasherInterface $userPasswordHasher
  ) {
  }

  public function make(
    string $emailAddress,
    string $phoneNumber,
    string $plainPassword
  ): SiteUser {
    $siteUser = new SiteUser();
    $siteUser->setEmailAddress($emailAddress);
    $siteUser->setPhoneNumber($phoneNumber);

    $hashedPassword = $this->userPasswordHasher->hashPassword($siteUser, $plainPassword);
    $siteUser->setPassword($hashedPassword);

    return $siteUser;
  }
}