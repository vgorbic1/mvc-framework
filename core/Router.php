<?php

namespace core;

/**
 * Router
 * @author Vlad Gorbich
 */
class Router {
	
	protected $routes = [];	
	protected $params = [];
	
	/****************
	* ROUTING TABLE *
	****************/
	
	// Add a route to the routing table
	public function addRoute($route, $params = []) {
		// Escape forward slashes
		$route = preg_replace('/\//', '\\/', $route);
		// Convert route vars to regexps (e.g. "home" to "{home}")
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
		// Convert route vars to custom regexps (e.g. "id:123" to "{id:123}")
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		// Add start and end delimiters and case sensitive flag
		$route = '/^' . $route . '$/i';
		// Add parameters
		$this->routes[$route] = $params;
	}
	
    // Get all routes in the routing table	
	public function getRoutes() {
		return $this->routes;
	}
	
	// Match the route to the routes in the routing table
	public function match($url) {
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url, $matches)) {
				// Remove numbers from the key in the array of matches
				foreach ($matches as $key => $match) {
					if (is_string($key)) {
						$params[$key] = $match;
					}
				}
				$this->params = $params;
				return true;
			}
		}
		return false;
	}
	
	// Get the currently matching params in the routing table
	public function getParams() {
		return $this->params;
	}

	
	/*************
	* DISPATCHER *
	*************/
	
	// Dispatcher
	public function dispatch($url) {
		$url = $this->removeQueryStringVariables($url);
		if ($this->match($url)) {
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);
			$controller = $this->getNamespace() . $controller;
			if (class_exists($controller)) {
				$controller_object = new $controller($this->params);
				$action = $this->params['action'];
				$action = $this->convertToCamelCase($action);
				if (is_callable([$controller_object, $action])) {
					$controller_object->$action();
				} else {
					throw new \Exception("Method $action (in controller $controller) not found");
				}
			} else {
				throw new \Exception("Controller class $controller not found");
			}
		} else {
			throw new \Exception("No route matched.", 404);
		}
	}

    // Get the namespace for the controller class
    protected function getNamespace() {
        $namespace = 'app\controllers\\';
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }	

    // Conver the string with hypens to StudlyCaps
    protected function convertToStudlyCaps($string) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    // Conver the string with hypens to cammelCase
    protected function convertToCamelCase($string) {
        return lcfirst($this->convertToStudlyCaps($string));
    }	
	
    // Remove query srting variables
    protected function removeQueryStringVariables($url) {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }	

}