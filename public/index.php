<?php

define(BASEDIR, dirname(__DIR__)); #获取项目的根目录


require_once BASEDIR.'/vendor/autoload.php';

// $loader = new Twig_Loader_Filesystem('/path/to/templates');
// $twig = new Twig_Environment($loader, array(
//     'cache' => '/path/to/compilation_cache',
// ));


// var_dump($_SERVER['QUERY_STRING']);exit;

# 5.6 之后 $_SERVER['QUERY_STRING'] 是url 中? 后面的内容

// echo BASEDIR;
// require BASEDIR.'/Core/Router.php';

$router = new Core\Router();
// spl_autoload_register([$router,'autoload']);

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}',['namespace'=>'Admin']);
    
// Display the routing table
//echo '<pre>';
//var_dump($router->getRoutes());
//echo '</pre>';

// Match the requested route
$url = $_SERVER['REQUEST_URI'];
$url = substr($url, 1);

// if ($router->match($url)) {
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// } else {
//     echo "No route found for URL '$url'";
// }
// 
// require BASEDIR . '/App/Controllers/Posts.php';

$router->dispatch($url);