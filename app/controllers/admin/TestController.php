<?php

namespace app\controllers\admin;

/**
 * Description of TestController
 *
 * @author Sergey
 */
class TestController extends AdminController
{

    public function indexAction() 
    {
        echo __METHOD__;
    }
    
    public function testAction() 
    {
        echo __METHOD__;
    }   

}
