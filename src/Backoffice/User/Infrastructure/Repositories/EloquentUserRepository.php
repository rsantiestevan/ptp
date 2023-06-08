<?php
declare(strict_types=1);

use Paycomet\Backoffice\User\Domain\User;
use Paycomet\Backoffice\User\Domain\UserEmail;
use Paycomet\Backoffice\User\Domain\UserId;
use Paycomet\Backoffice\User\Domain\UserName;
use Paycomet\Backoffice\User\Domain\UserRepository;
use Paycomet\Backoffice\User\Infrastructure\Repositories\Models\User as EloquentUserModel;

final class EloquentUserRepository implements UserRepository
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function find(UserId $id): ?User
    {
        // TODO: Implement find() method.
    }

    public function findByCriteria(UserName $userName, UserEmail $userEmail): ?User
    {
        // TODO: Implement findByCriteria() method.
    }

    public function save(User $user): void
    {
        $newUser = $this->eloquentUserModel;
        $data = [
            'name'              => $user->name()->value(),
            'email'             => $user->email()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'password'          => $user->password()->value(),
            'remember_token'    => $user->rememberToken()->value(),
        ];

        $newUser->create($data);

    }

    public function update(UserId $userId, User $user): void
    {
        // TODO: Implement update() method.
    }

    public function delete(UserId $id): void
    {
        // TODO: Implement delete() method.
    }
}
