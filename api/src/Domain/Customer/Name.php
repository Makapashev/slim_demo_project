<?php

declare(strict_types=1);

namespace App\Domain\Customer;


use App\Domain\ObjectValueInterface;
use InvalidArgumentException;
use Webmozart\Assert\Assert;

final class Name implements ObjectValueInterface
{
    private $value;

    /**
     * @param string $value
     * @throws InvalidArgumentException
     * */
    public function __construct(string $value)
    {
        $this->value = trim($value);
        Assert::notEmpty($this->value, 'Значение не может быть пустым');
        Assert::lengthBetween($this->value, 2, 50, 'Количество символов должно составлять от 2 до 50');
        $this->firstCharToUpperCase();
    }

    private function firstCharToUpperCase(): void
    {
        $this->value = ucfirst(strtolower($this->value));
    }

    public function getValue()
    {
        return $this->value;
    }
}