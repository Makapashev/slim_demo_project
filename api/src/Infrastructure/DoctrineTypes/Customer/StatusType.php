<?php

namespace App\Infrastructure\DoctrineTypes\Customer;

use App\Domain\Customer\Status;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class StatusType extends StringType
{
    public const NAME = 'customer_status';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Status ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? Status::{$value}() : null;
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