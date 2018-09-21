<?php

namespace app\controllers\admin;

/**
 * Description of UserController
 *
 * @author Sergey
 */
class UserController extends AdminController
{

    public function indexAction() 
    {
        $this->setMeta("Админка", "Панель администратора сайта", "админка");
    }
    
    public function testAction() 
    {
        echo __METHOD__;
    }   
}
