<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Model\Table\ArticlesTable;
use Cake\Http\Response;
use Cake\Utility\Text;

class ArticlesController extends AppController
{
    public function index(): void
    {
        $articles = $this->fetchTable('Articles')
            ->find()
            ->orderBy(['created' => 'DESC']);
        $this->set(compact('articles'));
    }

    public function add(): ?Response
    {
        $articlesTable = $this->fetchTable('Articles');
        $article = $articlesTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Auto-generate slug if not provided
            if (empty($data['slug']) && !empty($data['title'])) {
                $data['slug'] = Text::slug(strtolower($data['title']));
            }

            $article = $articlesTable->patchEntity($article, $data);
            if ($articlesTable->save($article)) {
                $this->Flash->success('Article saved.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Could not save article.');
        }

        $this->set(compact('article'));
        $this->set('statuses', [
            ArticlesTable::STATUS_DRAFT => 'Draft',
            ArticlesTable::STATUS_PUBLISHED => 'Published',
        ]);

        return null;
    }

    public function edit(?int $id = null): ?Response
    {
        $articlesTable = $this->fetchTable('Articles');
        $article = $articlesTable->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $articlesTable->patchEntity($article, $this->request->getData());
            if ($articlesTable->save($article)) {
                $this->Flash->success('Article saved.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Could not save article.');
        }

        $this->set(compact('article'));
        $this->set('statuses', [
            ArticlesTable::STATUS_DRAFT => 'Draft',
            ArticlesTable::STATUS_PUBLISHED => 'Published',
        ]);

        return null;
    }

    public function delete(?int $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesTable = $this->fetchTable('Articles');
        $article = $articlesTable->get($id);

        if ($articlesTable->delete($article)) {
            $this->Flash->success('Article deleted.');
        } else {
            $this->Flash->error('Could not delete article.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
