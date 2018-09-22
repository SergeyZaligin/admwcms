<?php

namespace wcms\base;

use wcms\Db;
use Valitron\Validator;
use \RedBeanPHP\R as R;
use Valitron\Validator as V;

/**
 * Description of Model
 *
 * @author Sergey
 */
abstract class Model 
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];
    
    public function load($data) 
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }
    
    public function validate($data) 
    {
        V::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if ($v->validate()) {
            return true;
        } else {
           $this->errors = $v->errors();
           return false;
        }
    }
    
    public function save($table) 
    {
        $tbl = R::dispense($table);
        
        foreach ($this->attributes as $name => $value) {
            $tbl->$name = $value;
        }
        
        return R::store($tbl);
    }
    
    public function getErrors() 
    {
        $errors = '<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors .= '<li>';
                $errors .= $item;
                $errors .= '</li>';
            }
        }
        $errors .= '</ul>';
        $_SESSION['validate_errors'] = $errors;
    }
    
    public function __construct() 
    {
        Db::instance();
    }

}
