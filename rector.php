<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Bundle210\Rector\Class_\EventSubscriberInterfaceToAttributeRector;
use Rector\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector;
use Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([__DIR__ . '/src', __DIR__ . '/tests', __DIR__ . '/utils']);
    $rectorConfig->importNames();
    $rectorConfig->parallel();

    $rectorConfig->skip(
        [
            FlipTypeControlToUseExclusiveTypeRector::class,
            RenameVariableToMatchMethodCallReturnTypeRector::class,
            RenamePropertyToMatchTypeRector::class,
            RenameParamToMatchTypeRector::class => [
                __DIR__ . '/src/Bundle/DependencyInjection/DoctrineBehaviorsExtension.php',
            ],
        ]
    );

    // doctrine annotations to attributes
    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::NAMING,
        LevelSetList::UP_TO_PHP_80,
    ]);

    $rectorConfig->rule(EventSubscriberInterfaceToAttributeRector::class);
};
