<?php

namespace wcms;

/**
 * Class ErrorHandler, handler errors
 *
 * @author Sergey
 */
class ErrorHandler 
{
    /**
     * Constructor ErrorHandler
     */
    public function __construct() 
    {
        if (DEBUG) {
            error_reporting(E_ALL);
        } else {
            error_reporting(0);
        }
        
        set_exception_handler([$this, 'exceptionHandler']);
    }
    
    /**
     * Handler exception
     * 
     * @param object exception $e
     */
    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError("Исключение", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }
    /**
     * Log errors
     * 
     * @param string $message
     * @param string $file
     * @param string $line
     */
    protected function logErrors($message = '', $file = '', $line = '') 
    {
        error_log(
            "[". date('Y-m-d H:i:s') ."]" . 
            " | Текст ошибки: {$message} | Файл {$file} | Строка {$line}\n ================= \n ", 
                    3, ROOT . '/tmp/errors.log');
    }
    
    /**
     * Display errors
     * 
     * @param string $errno
     * @param string $errstr
     * @param string $errfile
     * @param string $errline
     * @param string $response
     */
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 404) 
    {
        http_response_code($response);
        
        if($response === 404 && !DEBUG)
        {
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG)
        {
            require WWW . '/errors/dev.php';
        }
        else
        {
            require WWW . '/errors/prod.php';
        }
        
        die;
    }

}
