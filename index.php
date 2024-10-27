<?php
session_start();

use Router\Router;
use App\Controller\HomeController;

require __DIR__ . '/vendor/autoload.php';

Router::add('GET', '/', function() {
    $controller = new HomeController();
    $controller->form();
});

Router::add('GET', '/result', function() {
    $controller = new HomeController();
    $controller->result();
});

Router::add('POST', '/', function() {
    $controller = new HomeController();
    $controller->validateEmail();
});

// Dispatch the request URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];
Router::dispatch($requestUri, $requestMethod);