<?php
/**
 * Front Controller
 * @author Vlad Gorbich
 * @version 1.0
 */

// Get Twig Template Engine
require_once dirname(__DIR__) . '/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
 
// Autoloader
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' .str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    } 
});
 
// Routing
$router = new core\Router();
$router->addRoute('', ['controller' => 'Home', 'action' => 'index']);
$router->addRoute('{controller}/{action}');
$router->dispatch($_SERVER['QUERY_STRING']);





