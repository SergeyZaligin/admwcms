<?php

namespace app\controllers\admin;

use wcms\base\Controller; 
use app\models\AppModel;

/**
 * Description of AdminController
 *
 * @author Sergey
 */
abstract class AdminController extends Controller 
{
    public $layout = 'admin';
    
    public function __construct($route) 
    {
        parent::__construct($route);
        new AppModel();
    }

}
