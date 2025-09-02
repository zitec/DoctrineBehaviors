<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\SoftDeletable;

trait SoftDeletableTrait
{
    use SoftDeletablePropertiesTrait;
    use SoftDeletableMethodsTrait;
}
