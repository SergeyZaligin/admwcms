<?php
use wcms\Router;

// admin
//Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', 
        [
            'controller' => 'Main', 
            'action' => 'index',
            'prefix' => 'admin'
        ]);

// default
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', 
        [
            'controller' => 'Main', 
            'action' => 'index'
        ]);
