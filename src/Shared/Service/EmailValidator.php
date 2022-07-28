<?php

declare(strict_types=1);

namespace App\Shared\Service;

class EmailValidator
{
    protected const VALID_EMAIL_PATTERN = "/^(?=.{1,245}$)\w+([-+._']\w+)*@\w+([-._]\w+)*\.\w+([-.]\w+)*$/";

    public function check($email): bool
    {
        return 1 === preg_match(self::VALID_EMAIL_PATTERN, $email);
    }
}