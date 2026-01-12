<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    protected array $_accessible = [
        'slug' => true,
        'title' => true,
        'summary' => true,
        'content' => true,
        'status' => true,
        'published_at' => true,
        'created' => true,
        'modified' => true,
    ];
}
