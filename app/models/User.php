<?php

namespace app\models;

use \RedBeanPHP\R as R;

/**
 * Description of User
 *
 * @author Sergey
 */
class User extends AppModel
{
    public $attributes = [
        'name' => '',
        'login' => '',
        'password' => '',
        'email' => '',
        'role' => 'user'
        
    ];
    public $rules = [
        'required' => [
            'name',
            'login',
            'password',
            'email'
        ],
        'email' => [
            'email'
        ],
        'lengthMin' => [
            [
             'password',
             6
            ]
        ]
    ];
    
    public function checkUnique() 
    {
        $user = R::findOne('user', 'login = ? OR email = ? LIMIT 1', [
            $this->attributes['login'],
            $this->attributes['email']
        ]);
        if (!empty($user)) {
            if ($this->attributes['login'] === $user->login) {
                $this->errors['unique'][] = "Логин {$user->login} занят!";
            }
            if ($this->attributes['email'] === $user->email) {
                $this->errors['unique'][] = "Логин {$user->email} занят!";
            }
            return false;
        } else {
            return true;
        }
    }
}
