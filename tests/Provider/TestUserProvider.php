<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Tests\Provider;

use Zitec\DoctrineBehaviors\Contract\Provider\UserProviderInterface;

final class TestUserProvider implements UserProviderInterface
{
    private string $user = 'user';

    private ?string $userEntity = null;

    public function changeUser(string $user): void
    {
        $this->user = $user;
    }

    public function provideUser(): string
    {
        return $this->user;
    }

    public function provideUserEntity(): ?string
    {
        return $this->userEntity;
    }

    public function changeUserEntity(string $userEntity): void
    {
        $this->userEntity = $userEntity;
    }
}
