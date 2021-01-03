<?php

namespace App\Infrastructure\DoctrineTypes\Customer;

use App\Domain\Customer\Name;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class NameType extends StringType
{
    public const NAME = 'customer_name';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Name ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new Name((string)$value) : null;
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