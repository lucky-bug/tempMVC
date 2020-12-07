<?php

$baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
$appDir = $baseDir . 'app' . DIRECTORY_SEPARATOR;
$viewsDir = $appDir . 'View' . DIRECTORY_SEPARATOR;
$publicDir = $baseDir . 'public' . DIRECTORY_SEPARATOR;

require $baseDir . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$controllersNamespace = 'App\\Controller\\';
$modelsNamespace = 'App\\Model\\';

$routes = [
    'get:/posts' => ['controller' => 'PostController', 'method' => 'index'],
    'get:/posts/show' => ['controller' => 'PostController', 'method' => 'show'],
];

$route = strtolower($_SERVER['REQUEST_METHOD']) . ':' . $_REQUEST['route'];

$controllerName = $controllersNamespace . $routes[$route]['controller'];
$method = $routes[$route]['method'];

if (method_exists($controllerName, $method)) {
    $controller = new $controllerName();
    $response = $controller->$method();

    if (isset($response['view'])) {
        $view = $viewsDir . $response['view'];

        if (isset($response['data'])) {
            extract($response['data']);
        }

        include $view;
    } elseif (isset($response['data'])) {
        var_dump($response['data']);
    }
} else {
    header('HTTP/1.1 404 Not Found');
    echo '404 - Not Found';
}
