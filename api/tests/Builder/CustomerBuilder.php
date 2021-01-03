<?php


namespace Tests\Builder;


use App\Domain\Customer\Customer;
use App\Domain\Customer\Email;
use App\Domain\Customer\Name;
use App\Domain\Customer\PhoneNumber;

class CustomerBuilder
{
    private Name $firstName;
    private Name $lastName;
    private PhoneNumber $phoneNumber;
    private Email $email;
    private string $hash;

    public function __construct()
    {
        $this->firstName = new Name('Ruslan');
        $this->lastName = new Name('Alimamadov');
        $this->phoneNumber = new PhoneNumber('89745368456');
        $this->email = new Email('alimamadov@mail.ru');
        $this->hash = 'hash';
    }

    public function build(): Customer
    {
        return new Customer(
            $this->firstName,
            $this->lastName,
            $this->phoneNumber,
            $this->email,
            $this->hash
        );
    }
}