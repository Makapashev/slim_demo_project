<?php

declare(strict_types=1);

namespace App\Domain\Services;

interface Hasher
{
    public function getHash(string $password): string;
}