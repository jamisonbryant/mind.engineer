<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Http\Response;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login(): ?Response
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $redirect = $this->Authentication->getLoginRedirect() ?? '/admin/pages';

            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && $result && !$result->isValid()) {
            $this->Flash->error('Invalid email or password.');
        }

        return null;
    }

    public function logout(): ?Response
    {
        $this->Authentication->logout();
        $this->Flash->success('You have been logged out.');

        return $this->redirect('/admin/login');
    }
}
