<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */

//routing front page
Router::scope('/', function ($routes) {
    $routes->connect('/', ['controller' => 'FrontPage', 'action' => 'index']);
    $routes->connect('/:id', ['controller' => 'FrontPage', 'action' => 'view'],['pass' => ['id'], 'id' => '[0-9]+']);
});

//routing admin tools
Router::scope('/sq-admin', function ($routes) {
    $routes->connect('/', ['controller' => 'SqAdmin', 'action' => 'index']);
    $routes->connect('/add', ['controller' => 'SqAdmin', 'action' => 'add']);
    $routes->connect('/login', ['controller' => 'SqAdmin', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'SqAdmin', 'action' => 'logout']);
    $routes->connect('/post_list', ['controller' => 'SqAdmin', 'action' => 'post_list']);
    $routes->connect('/add_post', ['controller' => 'SqAdmin', 'action' => 'add_post']);
    $routes->connect('/edit_post/:id',
        ['controller' => 'SqAdmin', 'action' => 'edit_post'],
        [
            'pass' => ['id'],
            'id' => '[0-9]+'
        ]
    );
});

// routing Blog API
Router::scope('/api/v1', function ($routes) {
    $routes->extensions(['json']);
	$routes->resources('Imgs');
	$routes->resources('Posts',function($routes){
		$routes->resources('Tags');
	});
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
