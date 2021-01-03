<?php

declare(strict_types=1);

namespace App\Domain\Customer;


use App\Domain\ObjectValueInterface;
use InvalidArgumentException;
use Webmozart\Assert\Assert;

final class Email implements ObjectValueInterface
{
    private string $email;

    /**
     * @param string $email
     * @throws InvalidArgumentException
     */
    public function __construct(string $email)
    {
        $this->email = strtolower(trim($email));
        $this->validate();
    }

    /**
     * @throws InvalidArgumentException
     * */
    private function validate()
    {
        Assert::notEmpty($this->email, 'Заполните значение Email');
        Assert::email($this->email, 'Не валидный email');
    }

    public function getValue(): string
    {
        return $this->email;
    }
}