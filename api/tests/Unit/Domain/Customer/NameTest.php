<?php

namespace Tests\Unit\Domain\Customer;

use App\Domain\Customer\Name;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    public function testCorrectName()
    {
        $textName = 'Ruslan';
        $name = new Name($textName);
        self::assertEquals($textName, $name->getValue());
    }

    public function testTrimName()
    {
        $name = new Name('    Ruslan  ');
        self::assertEquals('Ruslan', $name->getValue());
    }

    public function testCaseNameChange()
    {
        $name = new Name('  ruslan ');
        self::assertEquals('Ruslan', $name->getValue());
    }

    public function testOneSymbolName()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Количество символов должно составлять от 2 до 50');
        new Name('n');
    }

    public function testFiftyOneSymbolName()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Количество символов должно составлять от 2 до 50');
        new Name('lkjfsesssssssdfsfsesss231ssss3sssssssssssssssssssss');
    }

    public function testEmptyName()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Значение не может быть пустым');
        new Name('');
    }
}