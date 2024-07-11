<?php

namespace App\Interface;

interface GeoApifyApiServiceInterface
{
    public function getLocation(string $location): array;
}
