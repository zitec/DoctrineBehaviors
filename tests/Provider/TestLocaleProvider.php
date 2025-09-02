<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Tests\Provider;

use Zitec\DoctrineBehaviors\Contract\Provider\LocaleProviderInterface;

final class TestLocaleProvider implements LocaleProviderInterface
{
    public function provideCurrentLocale(): ?string
    {
        return 'en';
    }

    public function provideFallbackLocale(): ?string
    {
        return 'en';
    }
}
