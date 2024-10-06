<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\SiteUser;
use App\Factory\SiteUserFactory;
use Doctrine\ORM\EntityManagerInterface;

final class CreateSiteUserService
{
  public function __construct(
    private readonly EntityManagerInterface $em,
    private readonly SiteUserFactory $siteUserFactory
  ) {
  }

  public function create(
    string $emailAddress,
    string $phoneNumber,
    string $plainPassword
  ): SiteUser {
    $siteUser = $this->siteUserFactory->make(
      $emailAddress,
      $phoneNumber,
      $plainPassword
    );
    $this->em->persist($siteUser);
    $this->em->flush();
    
    return $siteUser;
  }
}