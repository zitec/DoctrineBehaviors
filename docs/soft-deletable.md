# Soft-Deletable

## Entity

```php 
<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zitec\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface;
use Zitec\DoctrineBehaviors\Model\SoftDeletable\SoftDeletableTrait;

/**
 * @ORM\Entity
 */
class Category implements SoftDeletableInterface
{
    use SoftDeletableTrait;
}
```

## Usage

```php
<?php

/** @var Zitec\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface $category */
$category = new Category();
$entityManager->persist($category);
$entityManager->flush();

// get id for later
$id = $category->getId();

// now remove it
$entityManager->remove($category);
$entityManager->flush();

// entity is still there
$categoryRepository = $entityManager->getRepository(Category::class);
$category = $categoryRepository->findOneById($id);

// but it's "deleted"
var_dump($category->isDeleted()); 
// true
```

### Restore?

```php
<?php

use Zitec\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface;

/** @var SoftDeletableInterface $category */
$category->restore();

var_dump($category->isDeleted());
// false

// do not forget to call flush method to apply the change
$entityManager->flush();
```

### Delete at Given Time?

```php
<?php

use Zitec\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface;

/** @var SoftDeletableInterface $category */
$category = new Category();

$entityManager->persist($category);
$entityManager->flush();

// delete it tomorrow
$tomorrowDateTime = (new \DateTime())->modify('+1 day');
$category->setDeletedAt($tomorrowDateTime);

var_dump($category->isDeleted());
// false

// 24 hours later...

// OK, I'm deleted
var_dump($category->isDeleted()); 
// true
```
