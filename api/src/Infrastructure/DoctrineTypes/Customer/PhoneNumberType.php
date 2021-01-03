<?php

namespace App\Infrastructure\DoctrineTypes\Customer;

use App\Domain\Customer\PhoneNumber;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class PhoneNumberType extends StringType
{
    public const NAME = 'customer_phone_number';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof PhoneNumber ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new PhoneNumber((string)$value) : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}