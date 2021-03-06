<?php

declare(strict_types=1);

namespace App\Domain\Customer;

use App\Domain\ObjectValueInterface;

final class Status implements ObjectValueInterface
{
    private const ACTIVE = 'active';
    private const BANNED = 'banned';
    private string $status;

    private function __construct(string $status)
    {
        $this->status = $status;
    }

    public static function active(): Status
    {
        return new self(self::ACTIVE);
    }

    public static function banned(): Status
    {
        return new self(self::BANNED);
    }

    public function isActive(): bool
    {
        return $this->status === self::ACTIVE;
    }

    public function isBanned(): bool
    {
        return $this->status === self::BANNED;
    }

    public function getValue(): string
    {
        return $this->status;
    }
}