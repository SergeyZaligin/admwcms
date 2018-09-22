<?php

namespace app\controllers;

use wcms\base\Controller;
use app\models\AppModel;
/**
 * Base controller on application
 *
 * @author Sergey
 */
class AppController extends Controller
{
    public function __construct($route) 
    {
        parent::__construct($route);
        new AppModel();
        
    }
}
