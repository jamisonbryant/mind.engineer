<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class EmailSubscriptionsController extends AppController
{
    public function index(): void
    {
        $subscriptions = $this->fetchTable('EmailSubscriptions')
            ->find()
            ->orderBy(['created' => 'DESC']);
        $this->set(compact('subscriptions'));
    }
}
