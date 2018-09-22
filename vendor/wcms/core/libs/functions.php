<?php
/**
 * Function for debug
 * 
 * @param mixed $param
 */
function debug($param) 
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

function redirect ($http = false) 
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: {$redirect}");
    exit;
}

function h($str) 
{
    return htmlspecialchars($str, ENT_QUOTES);
}