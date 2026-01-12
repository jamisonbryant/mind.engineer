<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

class EmailSubscriptionsController extends AppController
{
    public function add(): ?Response
    {
        $this->request->allowMethod(['post']);

        $subscriptionsTable = $this->fetchTable('EmailSubscriptions');
        $subscription = $subscriptionsTable->newEntity($this->request->getData());

        if ($subscriptionsTable->save($subscription)) {
            $this->Flash->success('Thanks for subscribing!');
        } else {
            $errors = $subscription->getErrors();
            if (isset($errors['email']['_isUnique'])) {
                $this->Flash->success('You\'re already subscribed!');
            } else {
                $this->Flash->error('Something went wrong. Please try again.');
            }
        }

        return $this->redirect('/');
    }
}
