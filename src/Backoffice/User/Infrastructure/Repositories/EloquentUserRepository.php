<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\User\Infrastructure\Repositories;

use Paycomet\Backoffice\User\Domain\User;
use Paycomet\Backoffice\User\Domain\UserEmail;
use Paycomet\Backoffice\User\Domain\UserId;
use Paycomet\Backoffice\User\Domain\UserName;
use Paycomet\Backoffice\User\Domain\UserPassword;
use Paycomet\Backoffice\User\Domain\UserRememberToken;
use Paycomet\Backoffice\User\Domain\UserRepository;
use Paycomet\Backoffice\User\Infrastructure\Repositories\Models\User as EloquentUserModel;

final class EloquentUserRepository implements UserRepository
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    private function getFilledUser($user): User
    {
        return User::create(
            new UserId($user->id),
            new UserName($user->name),
            new UserEmail($user->email),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function find(UserId $id): ?User
    {
        $mUser = $this->eloquentUserModel->findOrFail($id->value());
        // Return Domain User model
        return $this->getFilledUser($mUser);
    }

    public function findByCriteria(UserName $userName, UserEmail $userEmail, UserPassword $userPassword): User
    {
        $userId = UserId::random();
        $mUser = $this->eloquentUserModel->firstOrCreate([
                'id'        => $userId->value(),
                'name'      => $userName->value(),
                'email'     => $userEmail->value(),
                'password'  => $userPassword->value(),
            ]);
        return $this->getFilledUser($mUser);
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

}
