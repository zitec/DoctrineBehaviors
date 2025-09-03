<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Tests\Fixtures\Entity;

use ArrayAccess;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Stringable;
use Zitec\DoctrineBehaviors\Contract\Entity\TreeNodeInterface;
use Zitec\DoctrineBehaviors\Model\Tree\TreeNodeTrait;
use Zitec\DoctrineBehaviors\Tests\Fixtures\Repository\TreeNodeRepository;

#[Entity(repositoryClass: TreeNodeRepository::class)]
class TreeNodeEntity implements TreeNodeInterface, ArrayAccess, Stringable
{
    use TreeNodeTrait;

    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'NONE')]
    private ?int $id = null;

    #[Column(type: 'string', length: 255, nullable: true)]
    private ?string $name = null;

    public function __toString(): string
    {
        return (string) $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
