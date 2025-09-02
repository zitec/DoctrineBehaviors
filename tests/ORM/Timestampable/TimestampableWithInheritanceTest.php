<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\Tests\ORM\Timestampable;

use DateTime;
use Zitec\DoctrineBehaviors\Tests\AbstractBehaviorTestCase;
use Zitec\DoctrineBehaviors\Tests\Fixtures\Entity\Timestampable\TimestampableInheritedEntity;

final class TimestampableWithInheritanceTest extends AbstractBehaviorTestCase
{
    public function testItShouldInitializeCreateAndUpdateDatetimeWhenCreated(): void
    {
        $timestampableInheritedEntity = new TimestampableInheritedEntity();

        $this->entityManager->persist($timestampableInheritedEntity);
        $this->entityManager->flush();

        self::assertInstanceOf(Datetime::class, $timestampableInheritedEntity->getCreatedAt());
        self::assertInstanceOf(Datetime::class, $timestampableInheritedEntity->getUpdatedAt());
        self::assertSame(
            $timestampableInheritedEntity->getCreatedAt(),
            $timestampableInheritedEntity->getUpdatedAt(),
            'On creation, createdAt and updatedAt are the same'
        );
    }
}
