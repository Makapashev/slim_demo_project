<?php

namespace Tests\Unit\Domain\Account;

use App\Domain\Account\Balance;
use PHPUnit\Framework\TestCase;

class BalanceTest extends TestCase
{
    public function testInitBalance()
    {
        $balance = Balance::init();
        self::assertInstanceOf(Balance::class, $balance);
        self::assertEquals(0.0, $balance->getValue());
    }

    public function testSetNegativeBalance()
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Значение не может быть меньше 0');
        $balance = new Balance(-1);
    }

    public function testSuccess()
    {
        $val = 1.2;
        $balance = new Balance($val);
        self::assertEquals($val, $balance->getValue());
    }
}