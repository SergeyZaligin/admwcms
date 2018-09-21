<?php

namespace app\controllers;

use app\models\User;
/**
 * Description of UserController
 *
 * @author Sergey
 */
class UserController extends AppController 
{

    public function signupAction() 
    {
        $this->setMeta("Регистрация", "Регистрация", "Регистрация");
        
        if (!empty($_POST) && isset($_POST)) {
            $userModel = new User();
            $data = $_POST;
            $userModel->load($data);
            if (!$userModel->validate($data)) {
                $userModel->getErrors();
            }
        }
    }
        
    public function loginAction() 
    {
    
    }
        
    public function logoutAction() 
    {
    
    } 
    
}
