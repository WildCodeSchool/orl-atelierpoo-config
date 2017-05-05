<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 05/05/17
 * Time: 14:37
 */
require __DIR__.'/../vendor/autoload.php';

// Twig
$loader = new Twig_Loader_Filesystem(__DIR__.'/../src/ModFeed/Templates');
$twig = new Twig_Environment($loader,  array('debug' => true));
$twig->addExtension(new Twig_Extension_Debug());

// Fast Route
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/feed', ['class' => \ModFeed\Controller\FeedController::class,
                                                    'method' => 'getFeedAction']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);


$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        die('404');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        die('405');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $controller = new $handler['class']($twig);
        $html = call_user_func([$controller, $handler['method']]);
        break;
}

echo $html;
