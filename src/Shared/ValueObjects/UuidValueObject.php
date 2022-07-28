<?php

namespace App\Shared\ValueObjects;

use InvalidArgumentException;
use Symfony\Component\Uid\Uuid;

class UuidValueObject
{
    private readonly string $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        $this->value = $value;
    }

    public static function random(): self
    {
        return new self(Uuid::v4()->toRfc4122());
    }

    public function value(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid($id): void
    {
        if (!Uuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->toRfc4122();
    }

    public function __toString()
    {
        return $this->value();
    }
}