<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\SoftDeletable;

use DateTimeInterface;

trait SoftDeletablePropertiesTrait
{
    /**
     * @var DateTimeInterface|null
     */
    protected $deletedAt;
}
