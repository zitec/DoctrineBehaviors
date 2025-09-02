<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\Uuidable;

use Ramsey\Uuid\UuidInterface;

trait UuidablePropertiesTrait
{
    /**
     * @var UuidInterface|string|null
     */
    protected $uuid;
}
