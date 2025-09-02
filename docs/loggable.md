# Loggable

Loggable is able to track lifecycle modifications and log them using any third party log system.

## Entity

```php
<?php
 
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zitec\DoctrineBehaviors\Model\Loggable\LoggableTrait;
use Zitec\DoctrineBehaviors\Contract\Entity\LoggableInterface;

/**
 * @ORM\Entity
 */
class Category implements LoggableInterface
{
    use LoggableTrait;
}
```

## Logger Interface

These messages are then passed to the configured logger.
You can define your own, by passing a class that implements `Psr\Log\LoggerInterface`.
