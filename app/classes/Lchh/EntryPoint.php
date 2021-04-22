<?php

namespace Lchh;

class EntryPoint
{
    private $route;
    private $routes;
    private $method;
    public function __construct($route, $method, \Lchh\Routes $routes)
    {
        $this->route = $route;
        $this->routes = $routes;
        $this->method = $method;
        $this->checkUrl();
    }
    public function checkUrl()
    {
        if ($this->route !== strtolower($this->route)) {
            http_response_code(301);
            header('location: ' . URLROOT . strtolower($this->route));
        }
    }
    private function loadTemplate($templateFileName, $variables = [])
    {
        extract($variables);
        ob_start();
        include __DIR__ . '/../../templates/' . $templateFileName;
        return ob_get_clean();
    }
    private function loadDefaultTemplate($templateFileName, $routes)
    {
        $controller = $routes[$templateFileName]['GET']['controller'];
        $action = $routes[$templateFileName]['GET']['action'];
        $page = $controller->$action();
        $defaultOutput = $this->loadTemplate(
            $page['template'],
            $page['variables'],
        );
        return $defaultOutput;
    }
    public function run()
    {
        $routes = $this->routes->getRoutes();
        // defaul template will auto get load
        $defaultOutput = $this->loadDefaultTemplate('sidebar', $routes);
        // count user visit website
        $userOnl = new \Lchh\CountOnl('username', new \Lchh\RemoteAddress);
        // authentication class run through whole web
        $authentication = $this->routes->getAuthentication();

        if (!$authentication->isLoggedIn() && isset($routes[$this->route]["login"])) {
            header('Location: ' . URLROOT . 'login/error');
            exit;
        }

        // if (
        //     isset($routes[$this->route]["login"])
        //     && !$authentication->isLoggedIn()
        // ) {
        //     header('Location: ' . URLROOT . 'login/error');
        // }
        // elseif (
        //     isset($routes[$this->route]['permissions'])
        //     && !$this->routes->checkPermission($routes[$this->route]['permissions'])
        // ) {
        //     header('Location:' . URLROOT . 'login/error');
        // }

        // Check to see if controller and action exists or not
        if (isset($routes[$this->route][$this->method]['controller']) && isset($routes[$this->route][$this->method]['action'])) {
            $controller = $routes[$this->route][$this->method]['controller'];
            $action = $routes[$this->route][$this->method]['action'];
        } else {
            header('Location:' . URLROOT . 'quest/list');
            exit;
        }
        $page =  $controller->$action();

        $title = $page['title'];

        if (isset($page['variables'])) {
            $output = $this->loadTemplate(
                $page['template'],
                $page['variables'],
            );
        } else {
            $output = $this->loadTemplate($page['template']);
        }
        echo $this->loadTemplate(
            'layout.html.php',
            [
                'loggedIn' => $authentication->isLoggedIn(),
                'output' => $output,
                'defaultOutput' => $defaultOutput,
                'title' => $title,
                'calOnl' => $userOnl->calOnl()
            ]
        );
    }
}
