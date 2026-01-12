<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Http\Response;

class PagesController extends AppController
{
    public function index(): void
    {
        $pages = $this->fetchTable('Pages')->find()->orderBy(['modified' => 'DESC']);
        $this->set(compact('pages'));
    }

    public function edit(?int $id = null): ?Response
    {
        $pagesTable = $this->fetchTable('Pages');
        $page = $pagesTable->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $pagesTable->patchEntity($page, $this->request->getData());
            if ($pagesTable->save($page)) {
                $this->Flash->success('Page saved.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Could not save page.');
        }

        $this->set(compact('page'));

        return null;
    }
}
