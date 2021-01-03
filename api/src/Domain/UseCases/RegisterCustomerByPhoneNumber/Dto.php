<?php

declare(strict_types=1);

namespace App\Domain\UseCases\RegisterCustomerByPhoneNumber;

/**
 * @property string $phoneNumber
 * @property string $email
 * @property string $firstName
 * @property string $lastName
 * @property string $password
 * */
final class Dto
{
    public string $phoneNumber;
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $password;

    public static function setFromArray(array $params): self
    {
        $dto = new self();
        foreach ($params as $key => $value) {
            $dto->{$key} = $value;
        }
        return $dto;
    }
}