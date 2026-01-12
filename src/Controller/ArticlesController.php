<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class ArticlesController extends AppController
{
    public function index(): void
    {
        $articles = $this->fetchTable('Articles')->findPublished();
        $this->set(compact('articles'));
    }

    public function view(string $slug): void
    {
        $article = $this->fetchTable('Articles')
            ->findBySlug($slug)
            ->first();

        if (!$article) {
            throw new NotFoundException('Article not found');
        }

        $this->set(compact('article'));
    }
}
