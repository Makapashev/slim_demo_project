<?php


namespace Tests\Unit\Domain\Customer;


use App\Domain\Customer\PhoneNumber;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
    public function testCorrectPhoneNumber()
    {
        $phone = '89991234312';
        $phoneNumber = new PhoneNumber($phone);
        self::assertEquals('79991234312', $phoneNumber->getValue());
        $anotherPhone = '79991234312';
        $phoneNumber = new PhoneNumber($phone);
        self::assertEquals($anotherPhone, $phoneNumber->getValue());
    }

    public function testIncorrectCountryNumber()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectErrorMessage('Номер телефона должен начинаться с 8 или 7');
        new PhoneNumber('23813332411');
    }

    public function testIncorrectNumberLength()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectErrorMessage('Длинна номера должна составлять 11 символов');
        new PhoneNumber('7381333241');
    }

    public function testStringToPhoneNumber()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectErrorMessage('Номер должен состоять только из чисел');
        new PhoneNumber('7dfsefjies3');
    }
}