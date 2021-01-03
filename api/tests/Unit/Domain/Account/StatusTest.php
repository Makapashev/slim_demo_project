<?php

namespace Tests\Unit\Domain\Account;

use App\Domain\Account\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testActive()
    {
        $active = Status::active();
        self::assertInstanceOf(Status::class, $active);
        self::assertEquals('active', $active->getValue());
        self::assertTrue($active->isActive());
        self::assertFalse($active->isBanned());
        self::assertFalse($active->isWait());
    }

    public function testBanned()
    {
        $active = Status::banned();
        self::assertInstanceOf(Status::class, $active);
        self::assertEquals('banned', $active->getValue());
        self::assertFalse($active->isActive());
        self::assertTrue($active->isBanned());
        self::assertFalse($active->isWait());
    }

    public function testWait()
    {
        $active = Status::wait();
        self::assertInstanceOf(Status::class, $active);
        self::assertEquals('wait', $active->getValue());
        self::assertFalse($active->isActive());
        self::assertFalse($active->isBanned());
        self::assertTrue($active->isWait());
    }
}