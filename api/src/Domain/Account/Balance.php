<?php

namespace App\Domain\Account;

use App\Domain\ObjectValueInterface;
use InvalidArgumentException;
use Webmozart\Assert\Assert;

final class Balance implements ObjectValueInterface
{
    private float $value;

    /**
     * @param float $value
     * @throws InvalidArgumentException
     */
    public function __construct(float $value)
    {
        $this->value = $value;
        $this->validate();
    }

    /**
     * @throws InvalidArgumentException
     * */
    private function validate()
    {
        Assert::greaterThanEq($this->value, 0, 'Значение не может быть меньше 0');
    }

    public static function init(): Balance
    {
        return new self(0.0);
    }

    public function getValue(): float
    {
        return $this->value;
    }
}