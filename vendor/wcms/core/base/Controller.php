<?php

namespace wcms\base;

/**
 * Base controller on core
 *
 * @author Sergey
 */
abstract class Controller 
{
    /**
     * Array routes
     * 
     * @var array
     */
    public $route;
    /**
     * Controller name
     * 
     * @var string
     */
    public $controller;
    /**
     * Model name
     * 
     * @var string 
     */
    public $model;
    /**
     * View name
     * 
     * @var string
     */
    public $view;
    /**
     * layout name
     * 
     * @var string
     */
    public $layout;
    /**
     * Prefix name
     * 
     * @var string
     */
    public $prefix;
    /**
     * Data
     * 
     * @var array
     */
    public $data = [];
    /**
     * Meta info
     * 
     * @var array
     */
    public $meta = [];
    
    /**
     * Constructor controller
     * 
     * @param array $route
     */
    public function __construct($route) 
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }
    
    public function getView() 
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }
    
    /**
     * Set data for view
     * 
     * @param mixed  $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    
    /**
     * Set meta for metateg
     * 
     * @param type $title
     * @param type $keywords
     * @param type $description
     */
    public function setMeta($title, $description, $keywords)
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }
}
