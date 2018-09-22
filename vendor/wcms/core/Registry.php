<?php

namespace wcms;

/**
 * Class Registry realise pattern reestr
 *
 * @author Sergey
 */
class Registry 
{
    /**
     * Include trait TSingletone
     */
    use TSingletone;
    
    /**
     * For properties
     * 
     * @var array
     */
    protected static $properties = []; 
    
    /**
     * Set property
     * 
     * @param string $name
     * @param string $value
     */
    public function setProperty($name, $value) 
    {
        self::$properties[$name] = $value;
    }
    
    /**
     * Get property
     * 
     * @param string $name
     * @return mixed string|null
     */
    public function getProperty($name) 
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        } else {
            return null;
        }
    }
    
    /**
     * Get all properties
     * 
     * @return array
     */
    public function getProperties()
    {
        return self::$properties;
    }

}
