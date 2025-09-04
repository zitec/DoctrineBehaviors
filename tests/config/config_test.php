<?php

declare(strict_types=1);

use Zitec\DoctrineBehaviors\Contract\Provider\LocaleProviderInterface;
use Zitec\DoctrineBehaviors\Contract\Provider\UserProviderInterface;
use Zitec\DoctrineBehaviors\EventSubscriber\LoggableEventSubscriber;
use Zitec\DoctrineBehaviors\Tests\DatabaseLoader;
use Zitec\DoctrineBehaviors\Tests\Provider\TestLocaleProvider;
use Zitec\DoctrineBehaviors\Tests\Provider\TestUserProvider;
use Psr\Log\Test\TestLogger;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\Security\Core\Security;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set('env(DB_ENGINE)', 'pdo_sqlite');
    $parameters->set('env(DB_HOST)', 'localhost');
    $parameters->set('env(DB_NAME)', 'orm_behaviors_test');
    $parameters->set('env(DB_USER)', 'root');
    $parameters->set('env(DB_PASSWD)', '');
    $parameters->set('env(DB_MEMORY)', 'true');
    $parameters->set('kernel.secret', 'for_framework_bundle');
    $parameters->set('locale', 'en');

    $services = $containerConfigurator->services();

    $services->defaults()
        ->public()
        ->autowire()
        ->autoconfigure();

    $services->set(Security::class)
        ->arg('$container', service('service_container'));

    $services->set(TestLogger::class);

    $services->set(TestLocaleProvider::class);
    $services->alias(LocaleProviderInterface::class, TestLocaleProvider::class);

    $services->set(TestUserProvider::class);
    $services->alias(UserProviderInterface::class, TestUserProvider::class);

    $services->set(DatabaseLoader::class);

    $services->set(LoggableEventSubscriber::class)
        ->arg('$logger', service(TestLogger::class));

    $containerConfigurator->extension('doctrine', [
        'dbal' => [
            'dbname' => '%env(DB_NAME)%',
            'host' => '%env(DB_HOST)%',
            'user' => '%env(DB_USER)%',
            'password' => '%env(DB_PASSWD)%',
            'driver' => '%env(DB_ENGINE)%',
            'memory' => '%env(bool:DB_MEMORY)%',
        ],
        'orm' => [
            'auto_mapping' => true,
            'mappings' => [
                [
                    'name' => 'DoctrineBehaviors',
                    'type' => 'attribute',
                    'prefix' => 'Zitec\DoctrineBehaviors\Tests\Fixtures\Entity\\',
                    'dir' => __DIR__ . '/../../tests/Fixtures/Entity',
                    'is_bundle' => false,
                ],
            ],
        ],
    ]);
};
