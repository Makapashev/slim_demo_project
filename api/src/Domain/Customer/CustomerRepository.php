<?php
declare(strict_types=1);

namespace App\Domain\Customer;

interface CustomerRepository
{
    public function getActiveCustomerById(int $id): Customer;

    /**
     * @param PhoneNumber $phoneNumber
     * @return bool
     * @throws CustomerAlreadyExistsException
     */
    public function doesCustomerWithPhoneNumberExist(PhoneNumber $phoneNumber): bool;

    /**
     * @param Email $email
     * @return bool
     * @throws CustomerAlreadyExistsException
     */
    public function doesCustomerWithEmailExist(Email $email): bool;

    public function add(Customer $customer);
}