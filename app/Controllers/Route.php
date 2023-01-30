<?php

namespace Culture;

class Route
{
    private array $routes = [];

    public function addRoute($route, $controller, $action, $args= []): void
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action,
            'args' => $args,
        ];
    }

    public function route($url): void
    {
        foreach ($this->routes as $route => $params) {
            if ($route == $url) {
                $controller = "\Culture\\" . $params['controller'];
                $action = $params['action'];
                $args = $params['args'];
                break;
            }
        }

        if (isset($controller)) {
            $controller = new $controller();
            call_user_func_array([$controller, $action], $args);
        } else {
            Helper::pageNotFound();
        }
    }
}