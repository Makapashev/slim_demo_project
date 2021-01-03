<?php

namespace Tests\Unit\Domain\Customer;

use App\Domain\Customer\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testActive()
    {
        $active = Status::active();
        self::assertInstanceOf(Status::class, $active);
        self::assertEquals('active', $active->getValue());
        self::assertFalse($active->isBanned());
        self::assertTrue($active->isActive());
    }

    public function testBanned()
    {
        $active = Status::banned();
        self::assertInstanceOf(Status::class, $active);
        self::assertEquals('banned', $active->getValue());
        self::assertTrue($active->isBanned());
        self::assertFalse($active->isActive());
    }
}