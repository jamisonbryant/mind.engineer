<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    // Admin routes
    $routes->prefix('Admin', function (RouteBuilder $builder): void {
        $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        $builder->fallbacks();
    });

    // Public routes
    $routes->scope('/', function (RouteBuilder $builder): void {
        // Home page
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'home']);

        // Static pages
        $builder->connect('/about', ['controller' => 'Pages', 'action' => 'view', 'about']);
        $builder->connect('/manifesto', ['controller' => 'Pages', 'action' => 'view', 'manifesto']);

        // Articles
        $builder->connect('/articles', ['controller' => 'Articles', 'action' => 'index']);
        $builder->connect('/articles/{slug}', ['controller' => 'Articles', 'action' => 'view'])
            ->setPass(['slug']);

        // Email subscription
        $builder->connect('/subscribe', ['controller' => 'EmailSubscriptions', 'action' => 'add'])
            ->setMethods(['POST']);

        $builder->fallbacks();
    });
};
