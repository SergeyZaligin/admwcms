<?php

namespace app\models;


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
    
}
