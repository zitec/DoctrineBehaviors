<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Model\Translatable;

use Doctrine\Common\Collections\Collection;
use Zitec\DoctrineBehaviors\Contract\Entity\TranslationInterface;

trait TranslatablePropertiesTrait
{
    /**
     * @var Collection<string, TranslationInterface>
     */
    protected $translations;

    /**
     * @see mergeNewTranslations
     * @var Collection<string, TranslationInterface>
     */
    protected $newTranslations;

    /**
     * currentLocale is a non persisted field configured during postLoad event
     *
     * @var string|null
     */
    protected $currentLocale;

    /**
     * @var string
     */
    protected $defaultLocale = 'en';
}
