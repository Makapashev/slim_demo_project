<?php

declare(strict_types=1);

namespace App\Domain\UseCases\RegisterCustomerByPhoneNumber;

use App\Domain\Customer\Customer;
use App\Domain\Customer\CustomerAlreadyExistsException;
use App\Domain\Customer\CustomerRepository;
use App\Domain\Customer\Email;
use App\Domain\Customer\Name;
use App\Domain\Customer\PhoneNumber;
use App\Domain\Services\Flusher;
use App\Domain\Services\Hasher;

final class Handler
{
    private CustomerRepository $repository;
    private Flusher $flusher;
    private Hasher $hasher;

    public function __construct(
        CustomerRepository $repository,
        Flusher $flusher,
        Hasher $hasher
    )
    {
        $this->repository = $repository;
        $this->flusher = $flusher;
        $this->hasher = $hasher;
    }

    /**
     * @param Dto $dto
     * @throws CustomerAlreadyExistsException
     */
    public function handle(Dto $dto)
    {
        $phoneNumber = new PhoneNumber($dto->phoneNumber);
        $email = new Email($dto->email);

        $this->repository->doesCustomerWithEmailExist($email);
        $this->repository->doesCustomerWithPhoneNumberExist($phoneNumber);

        $customer = new Customer(
            new Name($dto->firstName),
            new Name($dto->lastName),
            $phoneNumber,
            $email,
            $this->hasher->getHash($dto->password)
        );

        $this->repository->add($customer);
        $this->flusher->flush();
    }
}