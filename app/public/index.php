<?php
require __DIR__ . '/../routers/patternrouter.php';

session_set_cookie_params(0, "/");
session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);