<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Persistence\Doctrine;

use App\Shared\ValueObjects\UuidValueObject;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class UuidType extends StringType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL(
            [
                'length' => '36',
            ]
        );
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?UuidValueObject
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof UuidValueObject) {
            return $value;
        }

        return new UuidValueObject($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof UuidValueObject) {
            return $value->value();
        }

        return $value;
    }
}