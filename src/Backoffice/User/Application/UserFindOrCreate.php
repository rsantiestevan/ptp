<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\User\Application;

use Paycomet\Backoffice\User\Domain\User;
use Paycomet\Backoffice\User\Domain\UserRepository;
use Paycomet\Backoffice\User\Domain\UserName;
use Paycomet\Backoffice\User\Domain\UserEmail;
use Paycomet\Backoffice\User\Domain\UserPassword;

final class UserFindOrCreate
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name, string $email, string $password): User
    {
        $userName = new UserName($name);
        $userEmail = new UserEmail($email);
        $userPassword = new UserPassword($password);

        return $this->repository->findByCriteria($userName, $userEmail, $userPassword);
    }
}
