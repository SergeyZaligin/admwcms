<?php

namespace wcms;

/**
 * Router app
 *
 * @author Sergey
 */
class Router 
{
    /**
     * Table routes
     * 
     * @var array
     */
    protected static $routes = [];
    
    /**
     * Current route
     * 
     * @var array
     */
    protected static $route = [];
    
    /**
     * Add route
     * 
     * @param regexp $regexp
     * @param array $route
     */
    public static function add($regexp, $route = []) 
    {
        self::$routes[$regexp] = $route;
    }
    
    /**
     * Dispatch url,if matchRoute return true and run controller action
     * 
     * @param string $url
     */
    public static function dispatch($url) 
    {
        // get query string params
        $url = self::removeQueryString($url);
        
        if (self::matchRoute($url)) {
                    $controller = 'app\controllers\\' . self::$route['prefix'] 
                            . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод {$controller}::{$action} не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер {$controller} не найден", 404);
            }
        } else {
            throw new \Exception('Страница не найдена', 404);
        }
    }
    /**
     * Find match url
     * 
     * @param string $url
     * @return bool
     */
    public static function matchRoute($url) 
    {
        // iteration on table routes
        foreach (self::$routes as $pattern => $route) {
            // find coincidence $pattern with $url and if true write value in $matches
            if (preg_match("#$pattern#", $url, $matches)) {
                // rebuild array $match in string key (except int) 
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value; 
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                //debug(self::$route);
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Handler string type of page-one PageOne
     * 
     * @param string $name
     */
    protected static function upperCamelCase($name) 
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    /**
     * Handler string indexAction
     * 
     * @param string $name
     */
    protected static function lowerCamelCase($name) 
    {
        return lcfirst(self::upperCamelCase($name));
    }
    /**
     * Handler string indexAction
     * 
     * @param string $name
     */
    protected static function removeQueryString($url) 
    {
        if ($url) {
            $params = explode('&', $url , 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
            debug($params);
        }
    }
    
    public static function getRoutes() 
    {
        return self::$routes;
    }
    
    public static function getRoute() 
    {
        return self::$route;
    }
    
    
}
