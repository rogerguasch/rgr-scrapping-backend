<?php

namespace App\Shared\ValueObjects;

abstract class StringValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function isNull(): bool
    {
        return null === $this->value;
    }

    public function isEmpty(): bool
    {
        return empty($this->value);
    }
}