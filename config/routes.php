<?php
/**
 * Routes configuration for The Mind Engineer
 *
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        // Home page
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        // Static pages (manifesto, about)
        $builder->connect('/manifesto', ['controller' => 'Pages', 'action' => 'display', 'manifesto']);
        $builder->connect('/about', ['controller' => 'Pages', 'action' => 'display', 'about']);

        // Articles routes
        $builder->connect('/articles', ['controller' => 'Articles', 'action' => 'index']);
        $builder->connect('/articles/{slug}', ['controller' => 'Articles', 'action' => 'view'])
            ->setPatterns(['slug' => '[a-z0-9\-]+'])
            ->setPass(['slug']);

        // Email subscriptions
        $builder->connect('/subscribe', ['controller' => 'EmailSubscriptions', 'action' => 'add']);

        // Fallbacks for remaining routes
        $builder->fallbacks();
    });

    // Admin routes
    $routes->prefix('Admin', function (RouteBuilder $builder): void {
        // Admin login/logout
        $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);

        // Admin dashboard
        $builder->connect('/', ['controller' => 'Dashboard', 'action' => 'index']);

        // Admin CRUD routes (uses fallbacks for standard CRUD)
        $builder->fallbacks();
    });
};
