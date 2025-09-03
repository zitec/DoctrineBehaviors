<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\Uuidable;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Zitec\DoctrineBehaviors\Exception\ShouldNotHappenException;

trait UuidableMethodsTrait
{
    public function setUuid(UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getUuid(): ?UuidInterface
    {
        if (is_string($this->uuid)) {
            if ($this->uuid === '') {
                throw new ShouldNotHappenException();
            }

            return Uuid::fromString($this->uuid);
        }

        return $this->uuid;
    }

    public function generateUuid(): void
    {
        if ($this->uuid) {
            return;
        }

        $this->uuid = Uuid::uuid4();
    }
}
