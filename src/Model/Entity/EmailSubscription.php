<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class EmailSubscription extends Entity
{
    protected array $_accessible = [
        'email' => true,
        'confirmed' => true,
        'created' => true,
    ];
}
