<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\Timestampable;

use DateTimeInterface;

trait TimestampablePropertiesTrait
{
    /**
     * @var DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var DateTimeInterface
     */
    protected $updatedAt;
}
