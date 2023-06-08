<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\User\Domain;

interface UserRepository
{
    public function find(UserId $id): ?User;

    public function findByCriteria(UserName $userName, UserEmail $userEmail): ?User;

    public function save(User $user): void;

    public function update(UserId $userId, User $user): void;

    public function delete(UserId $id): void;
}
