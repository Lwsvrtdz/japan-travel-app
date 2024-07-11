<?php

namespace App\Interface;

interface PlaceApiServiceInterface
{
    public function search(array $payload): array;
}
