<?php

namespace Tests\Unit\Domain\UseCases;

use App\Domain\Customer\Customer;
use App\Domain\Customer\Email;
use App\Domain\Customer\Name;
use App\Domain\Customer\PhoneNumber;
use PHPUnit\Framework\TestCase;

final class RegisterCustomerByPhoneNumberTest extends TestCase
{
    public function testSuccess()
    {
        $customer = new Customer(
            $firstName = new Name('Ruslan'),
            $lastName = new Name('Alimamadov'),
            $phoneNumber = new PhoneNumber('89745368456'),
            $email = new Email('alimamadov@mail.ru'),
            $hash = 'hash'
        );

        self::assertEquals($firstName, $customer->getFirstName());
        self::assertEquals($lastName, $customer->getLastName());
        self::assertEquals($phoneNumber, $customer->getPhoneNumber());
        self::assertEquals($email, $customer->getEmail());
        self::assertTrue($customer->isActive());
        self::assertFalse($customer->isBanned());

        self::assertEquals(json_encode([
            'id' => null,
            'firstName' => $customer->getFirstName(),
            'lastName' => $customer->getLastName(),
            'phoneNumber' => $customer->getPhoneNumber(),
            'email' => $customer->getEmail(),
        ]), json_encode($customer));
    }
}