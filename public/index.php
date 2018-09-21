<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

new wcms\App();

//debug(wcms\Router::getRoutes());

//throw new Exception('404', 404);