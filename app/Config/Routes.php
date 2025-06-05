<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->set404Override(function () {
    return view('404');
});

$routes->setTranslateURIDashes(false);

// Rutas personalizadas
$routes->get('products/(:any)', 'Products::details/$1');
$routes->get('news/(:any)', 'News::details/$1');
$routes->get('/', 'Home::index');



$routes->get('langs/es', 'Langs::es');
$routes->get('langs/en', 'Langs::en');
$routes->get('langs/tr', 'Langs::tr');
$routes->get('langs/jp', 'Langs::jp');
$routes->get('lang/de', 'Langs::de');
$routes->get('langs/ru', 'Langs::ru');
$routes->get('langs/zh', 'Langs::zh');
$routes->get('langs/fr', 'Langs::fr');
$routes->get('langs/pt', 'Langs::pt');
$routes->get('langs/hi', 'Langs::hi');
$routes->get('langs/ar', 'Langs::ar');
