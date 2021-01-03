<?php

declare(strict_types=1);

namespace App\Domain\Customer;

interface CustomerRepository
{
    /**
     * @param int $id
     * @return Customer
     * */
    public function getActiveCustomerById(int $id): Customer;

    /**
     * @param PhoneNumber $phoneNumber
     * @throws CustomerAlreadyExistsException
     */
    public function doesCustomerWithPhoneNumberExist(PhoneNumber $phoneNumber);

    /**
     * @param Email $email
     * @throws CustomerAlreadyExistsException
     */
    public function doesCustomerWithEmailExist(Email $email);

    /**
     * @param Customer $customer
     * @return void
     * */
    public function add(Customer $customer): void;
}