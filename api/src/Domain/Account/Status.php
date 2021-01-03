<?php

declare(strict_types=1);

namespace App\Domain\Account;

use App\Domain\ObjectValueInterface;

final class Status implements ObjectValueInterface
{
    private const WAIT = 'wait';
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

    public static function wait(): Status
    {
        return new self(self::WAIT);
    }

    public function isActive(): bool
    {
        return $this->status === self::ACTIVE;
    }

    public function isWait(): bool
    {
        return $this->status === self::WAIT;
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