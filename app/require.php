<?php

try {
    if (!isset($_SESSION)) session_start();
    include __DIR__ . '/includes/autoload.php';
    include __DIR__ . '/includes/Config.php';
    $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
    $route = str_replace(APPNAME, '', $route);
    $entryPoint = new \Lchh\EntryPoint($route, $_SERVER['REQUEST_METHOD'], new \Frdb\FrdbRoutes());
    $entryPoint->run();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error : ' . $e->getMessage() . 'in'  . $e->getFile() . 'line ' . $e->getLine();
}
