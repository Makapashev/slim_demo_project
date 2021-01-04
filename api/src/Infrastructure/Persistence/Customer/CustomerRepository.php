<?php


namespace App\Infrastructure\Persistence\Customer;


use App\Domain\Customer\Customer;
use App\Domain\Customer\Email;
use App\Domain\Customer\PhoneNumber;

class CustomerRepository implements \App\Domain\Customer\CustomerRepository
{

    /**
     * @inheritDoc
     */
    public function getActiveCustomerById(int $id): Customer
    {
        // TODO: Implement getActiveCustomerById() method.
    }

    /**
     * @inheritDoc
     */
    public function doesCustomerWithPhoneNumberExist(PhoneNumber $phoneNumber)
    {
        // TODO: Implement doesCustomerWithPhoneNumberExist() method.
    }

    /**
     * @inheritDoc
     */
    public function doesCustomerWithEmailExist(Email $email)
    {
        // TODO: Implement doesCustomerWithEmailExist() method.
    }

    /**
     * @inheritDoc
     */
    public function add(Customer $customer): void
    {
        // TODO: Implement add() method.
    }
}