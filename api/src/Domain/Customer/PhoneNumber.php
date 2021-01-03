<?php

declare(strict_types=1);

namespace App\Domain\Customer;

use App\Domain\ObjectValueInterface;
use Webmozart\Assert\Assert;

final class PhoneNumber implements ObjectValueInterface
{
    private string $value;

    /**
     * @param string $value
     * @throws InvalidArgumentException
     * */
    public function __construct(string $value)
    {
        $this->value = trim($value);
        $this->validate();
    }

    /**
     * @throws InvalidArgumentException
     * */
    private function validate()
    {
        Assert::notEmpty($this->value, 'Номер телефона не может быть пустым');
        Assert::inArray($this->value[0], ['8', '7'], 'Номер телефона должен начинаться с 8 или 7');
        Assert::length($this->value, 11, 'Длинна номера должна составлять 11 символов');
        Assert::numeric($this->value, 'Номер должен состоять только из чисел');
        $this->replaceEightToSeven();
    }

    private function replaceEightToSeven()
    {
        if ($this->value[0] === '8') {
            $this->value[0] = '7';
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }
}