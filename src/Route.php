<?php

namespace Skarner2016\Route;

class Route
{
    private $controller;

    private $action;

    final public function run()
    {
        // $this->controller = $this->controller ?: 'App\\Controllers\\IndexController';
        // $this->action     = $this->action ?: 'index';

        return call_user_func([$this->controller, $this->action]);
    }

    public function addSimple($namespace = 'App\\Controllers')
    {
        if (!$requestUri = trim($_SERVER['REQUEST_URI'] ?? '', '/')) {
            $this->controller = sprintf('%s\\IndexController', $namespace);
            $this->action     = 'index';
        } else {
            $requestUriArr = explode('/', $requestUri);
            if (count($requestUriArr) >= 4) {
                $this->controller = sprintf('%s\\%s\\%sController', $namespace, $requestUriArr[0], $requestUriArr[1], $requestUriArr[2]);
                $this->action     = $requestUriArr[3];
            }
    
            if (count($requestUriArr) == 3) {
                $this->controller = sprintf('%s\\%sController', $namespace, $requestUriArr[0], $requestUriArr[1]);
                $this->action     = $requestUriArr[2];
            }
    
            if (count($requestUriArr) == 2) {
                $this->controller = sprintf('%s\\%sController', $namespace, $requestUriArr[0]);
                $this->action     = $requestUriArr[1];
            }
    
            if (count($requestUriArr) == 1) {
                $this->controller = sprintf('%s\\%sController', $namespace, $requestUriArr[0]);
                $this->action     = 'index';
            }
        }
    }
}
