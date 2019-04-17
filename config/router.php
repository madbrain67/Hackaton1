<?php

/**
 *   Routeur.
 *
 *   Explode URL et appel Class et methods
 */
$route = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: 'Home');
$class = 'App\\Controller\\'.ucfirst($route[0] ?? '').'Controller';
$method = $route[1] ?? '';
$vars = array_slice($route, 2);

if (class_exists($class, true)) {
    $class = new $class();
    if (in_array($method, get_class_methods($class))) {
        echo call_user_func_array([$class, $method], $vars);
    } else {
        echo call_user_func([$class, 'index']);
    }
} else {
    header('HTTP/1.0 404 Not Found');
    echo '404 - Page not found';
    exit();
}
