<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\User\Domain;

final class UserRememberToken
{
    private $value;

    public function __construct(?string $rememberToken)
    {
        $this->value = $rememberToken;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
