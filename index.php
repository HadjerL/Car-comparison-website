<?php
$routes = [
    '/Car-comparison-website/' => 'controller@showPage',            // Home page route
    '/Car-comparison-website/news' => 'newsController@showPage',            // Home page route
    '/Car-comparison-website/comparator' => 'comparatorController@showPage',   // Contact page route
    '/Car-comparison-website/makes' => 'makesController@showPage',   // Contact page route
    '/Car-comparison-website/reviews' => 'reviewsController@showPage',   // Contact page route
    '/Car-comparison-website/buying-guide' => 'buyingGuideController@showPage',   // Contact page route
    '/Car-comparison-website/contact' => 'contactController@showPage',   // Contact page route
];

// Get the current URL path
$path = $_SERVER['REQUEST_URI'];

if (array_key_exists($path, $routes)) {
    $routeParts = explode('@', $routes[$path]);

    $controllerName = $routeParts[0];
    $methodName = $routeParts[1];

    require_once __DIR__ . '/controller/' . $controllerName . '.php';

    $controller = new $controllerName();

    $controller->$methodName();
} else {
    echo '404 - Page not found';
}
