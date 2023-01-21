<?php
require __DIR__ . '/../routers/patternrouter.php';

session_set_cookie_params(0, "/");
session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');

/*if ($uri[1] === 'catalogue' && $uri[2] === 'detail') {
    $bikeId = null;
    if (isset($uri[3])) {
        $bikeId = (int) $uri[3];
    }

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    require_once __DIR__ . '/../controllers/CatalogueController.php';
    require_once __DIR__ . '/../repositories/CatalogueRepository.php';

    // pass the request method and user ID to the PersonController and process the HTTP request:
    $controller = new CatalogueController($dbConnection, $requestMethod, $bikeId);
    $controller->processRequest();
}*/

$router = new PatternRouter();
$router->route($uri);