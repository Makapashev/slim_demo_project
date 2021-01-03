<?php


namespace App\Infrastructure\DoctrineTypes\Account;


use App\Domain\Account\Balance;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\FloatType;

final class BalanceType extends FloatType
{
    public const NAME = 'account_balance';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Balance ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new Balance((float)$value) : null;
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