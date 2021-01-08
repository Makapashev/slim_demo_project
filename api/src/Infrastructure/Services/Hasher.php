<?php

declare(strict_types=1);

namespace App\Infrastructure\Services;

use Webmozart\Assert\Assert;

final class Hasher implements \App\Domain\Services\Hasher
{
    private int $memoryCost;

    public function __construct(int $memoryCost = PASSWORD_BCRYPT_DEFAULT_COST)
    {
        $this->memoryCost = $memoryCost;
    }

    public function getHash(string $password): string
    {
        Assert::notEmpty($password, 'Введите пароль');
        return password_hash(
            $password,
            PASSWORD_BCRYPT,
            ['memory_cost' => $this->memoryCost]
        );
    }
}