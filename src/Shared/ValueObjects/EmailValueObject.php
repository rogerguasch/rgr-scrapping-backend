<?php

namespace App\Shared\ValueObjects;

use App\Shared\Service\EmailValidator;
use InvalidArgumentException;

abstract class EmailValueObject extends StringValueObject
{
    private EmailValidator $validator;

    public function __construct(string $value)
    {
        $this->validator = new EmailValidator();
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(string $emailAddress): void
    {
        if (!$this->validator->check($emailAddress)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $emailAddress));
        }
    }
}