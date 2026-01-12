<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Page extends Entity
{
    protected array $_accessible = [
        'slug' => true,
        'title' => true,
        'subtitle' => true,
        'content' => true,
        'is_published' => true,
        'created' => true,
        'modified' => true,
    ];
}
