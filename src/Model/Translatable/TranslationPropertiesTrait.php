<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\Translatable;

use Zitec\DoctrineBehaviors\Contract\Entity\TranslatableInterface;

trait TranslationPropertiesTrait
{
    /**
     * @var string
     */
    protected $locale;

    /**
     * Will be mapped to translatable entity by TranslatableSubscriber
     *
     * @var TranslatableInterface
     */
    protected $translatable;
}
