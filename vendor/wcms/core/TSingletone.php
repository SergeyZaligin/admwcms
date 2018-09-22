<?php

namespace wcms;

/**
 * Trait TSingletone for realise pattern singletone
 *
 * @author Sergey
 */
trait TSingletone 
{
    /**
     * Instance object
     * 
     * @var object
     */
    private static $instance;
    
    /**
     * Instance new object
     * 
     * @return object
     */
    public static function instance() 
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }

}
