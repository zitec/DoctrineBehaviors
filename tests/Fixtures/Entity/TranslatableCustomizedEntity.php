<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Tests\Fixtures\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Zitec\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Zitec\DoctrineBehaviors\Model\Translatable\TranslatableTrait;
use Zitec\DoctrineBehaviors\Tests\Fixtures\Entity\Translation\TranslatableCustomizedEntityTranslation;

/**
 * Used to test translation classes which declare custom translatable classes.
 */
#[Entity]
class TranslatableCustomizedEntity implements TranslatableInterface
{
    use TranslatableTrait;

    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'AUTO')]
    private int $id;

    /**
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    public static function getTranslationEntityClass(): string
    {
        return TranslatableCustomizedEntityTranslation::class;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
