<?php

declare(strict_types=1);

namespace Zitec\DoctrineBehaviors\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Zitec\DoctrineBehaviors\Contract\Entity\UuidableInterface;

final class UuidableEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [
            Events::loadClassMetadata,
            Events::prePersist,
        ];
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $loadClassMetadataEventArgs): void
    {
        $classMetadata = $loadClassMetadataEventArgs->getClassMetadata();
        if ($classMetadata->reflClass === null) {
            // Class has not yet been fully built, ignore this event
            return;
        }

        if (! is_a($classMetadata->reflClass->getName(), UuidableInterface::class, true)) {
            return;
        }

        if ($classMetadata->hasField('uuid')) {
            return;
        }

        $classMetadata->mapField([
            'fieldName' => 'uuid',
            'type' => 'string',
            'nullable' => true,
        ]);
    }

    public function prePersist(PrePersistEventArgs $lifecycleEventArgs): void
    {
        $entity = $lifecycleEventArgs->getObject();
        if (! $entity instanceof UuidableInterface) {
            return;
        }

        $entity->generateUuid();
    }
}
