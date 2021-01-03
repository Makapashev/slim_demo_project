<?php


namespace App\Infrastructure\Services;


final class Hasher implements \App\Domain\Services\Hasher
{
    public function getHash(string $password): string
    {
        return $password;
    }
}