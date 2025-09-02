<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\Tree;

use Doctrine\Common\Collections\Collection;
use Zitec\DoctrineBehaviors\Contract\Entity\TreeNodeInterface;

trait TreeNodePropertiesTrait
{
    /**
     * @var string
     */
    protected $materializedPath = '';

    /**
     * @var Collection|TreeNodeInterface[]
     */
    private $childNodes;

    /**
     * @var TreeNodeInterface|null
     */
    private $parentNode;
}
