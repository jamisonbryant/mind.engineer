<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;

/**
 * Pages Controller
 *
 * Handles display of CMS pages (home, about, manifesto)
 */
class PagesController extends AppController
{
    /**
     * Before filter callback
     *
     * @param \Cake\Event\EventInterface $event The event instance.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Allow unauthenticated access to all pages
        $this->Authentication->addUnauthenticatedActions(['display']);
    }

    /**
     * Display a page by slug
     *
     * @param string|null $slug Page slug
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function display(?string $slug = null)
    {
        if ($slug === null) {
            $slug = 'home';
        }

        $pagesTable = $this->fetchTable('Pages');

        try {
            $page = $pagesTable->find()
                ->where([
                    'Pages.slug' => $slug,
                    'Pages.is_published' => true,
                ])
                ->firstOrFail();
        } catch (RecordNotFoundException $e) {
            throw new NotFoundException('Page not found');
        }

        $this->set(compact('page'));
        $this->viewBuilder()->setTemplate('display');
    }
}
