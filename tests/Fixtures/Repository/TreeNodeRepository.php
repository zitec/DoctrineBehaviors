<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Tests\Fixtures\Repository;

use Doctrine\ORM\EntityRepository;
use Zitec\DoctrineBehaviors\ORM\Tree\TreeTrait;

final class TreeNodeRepository extends EntityRepository
{
    use TreeTrait;
}
