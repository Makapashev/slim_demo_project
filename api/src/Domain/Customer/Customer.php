<?php
declare(strict_types=1);

namespace App\Domain\Customer;

use App\Domain\Account\Account;
use ArrayObject;
use DateTime;
use JsonSerializable;

final class Customer implements JsonSerializable
{
    private ?int $id;
    private Name $firstName;
    private Name $lastName;
    private PhoneNumber $phoneNumber;
    private string $passwordHash;
    private Email $email;
    private ArrayObject $accounts;
    private Status $status;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(Name $firstName,
                                Name $lastName,
                                PhoneNumber $phoneNumber,
                                Email $email,
                                string $hash)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->passwordHash = $hash;
        $this->email = $email;
        $this->accounts = new ArrayObject();
        $this->status = Status::active();
    }

    public function getFullName(): string
    {
        return "{$this->firstName->getValue()} {$this->lastName->getValue()}";
    }

    public function getLastName(): Name
    {
        return $this->lastName;
    }

    public function getFirstName(): Name
    {
        return $this->firstName;
    }

    public function getPhoneNumber(): PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->status->isActive();
    }

    public function isBanned(): bool
    {
        return $this->status->isBanned();
    }

    public function createNewAccount(): void
    {
        $account = new Account();
        $this->accounts->append($account);
    }

    public function getAccounts(): array
    {
        return $this->accounts->getArrayCopy();
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => null,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
        ];
    }
}