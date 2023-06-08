<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\User\Domain;

final class User
{
    private $id;
    private $name;
    private $email;
    private $emailVerifiedDate;
    private $password;
    private $rememberToken;

    public function __construct(
        UserId $id,
        UserName $name,
        UserEmail $email,
        UserPassword $password,
        UserRememberToken $rememberToken
    )
    {
        $this->id                = $id;
        $this->name              = $name;
        $this->email             = $email;
        $this->password          = $password;
        $this->rememberToken     = $rememberToken;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function emailVerifiedDate(): UserEmailVerifiedDate
    {
        return $this->emailVerifiedDate;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function rememberToken(): UserRememberToken
    {
        return $this->rememberToken;
    }

    public static function create(
        UserId $id,
        UserName $name,
        UserEmail $email,
        UserPassword $password,
        UserRememberToken $rememberToken
    ): User
    {
        $user = new self($id, $name, $email, $password, $rememberToken);

        return $user;
    }
}
