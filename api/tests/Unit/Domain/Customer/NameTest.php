<?php


namespace Tests\Unit\Domain\Customer;


use App\Domain\Customer\Name;
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
}