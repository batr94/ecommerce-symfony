<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class AddUserAddressDTO
{
    public function __construct(
      public int $countryId,
      public string $city,
      public string $addressLine1,
    ) {}
}