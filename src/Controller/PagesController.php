<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class PagesController extends AppController
{
    public function home(): void
    {
        $pagesTable = $this->fetchTable('Pages');
        $page = $pagesTable->find()
            ->where(['slug' => 'home', 'is_published' => true])
            ->first();

        if (!$page) {
            throw new NotFoundException('Page not found');
        }

        $this->set(compact('page'));
    }

    public function view(string $slug): void
    {
        $pagesTable = $this->fetchTable('Pages');
        $page = $pagesTable->find()
            ->where(['slug' => $slug, 'is_published' => true])
            ->first();

        if (!$page) {
            throw new NotFoundException('Page not found');
        }

        $this->set(compact('page'));
    }
}
