<?php
// +----------------------------------------------------------------------
// | StartPHP
// +----------------------------------------------------------------------
// | Copyright (c) 20021~2022 Cat Catalpa Vitality All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: company@catcatalpa.com
// +----------------------------------------------------------------------
//Session操作模型

namespace premodel\Session;

class Session{
    function assign($sessionName){
        $_SESSION[$sessionName['name']] = $sessionName['value'];
        return $_SESSION[$sessionName['name']] == $sessionName['value'];
    }
     
    static public function equal($sessionName,$value){
        if (isset($_SESSION[$sessionName])) return $_SESSION[$sessionName] == $value;
        else return false;
    }
}

function session($sessionName,$value=""){
    global $session;
    global $env;
    if (session_status() !== PHP_SESSION_ACTIVE && $env['session_auto_load'] == true) session_start();
    if(empty($value) && !is_array($sessionName)) return isset($_SESSION[$sessionName]) ? $_SESSION[$sessionName] : false;
    else return $session->assign($sessionName);
    $isMatched = preg_match('/\[\[.+?\]\]/', $value, $matches);
    if ($isMatched != 0) {
        $condition = preg_replace('/\[\[(.+?)\]\]/','$1',$matches[0]);
        $vars = str_replace($matches[0],"",$value);
        switch ($condition) {
            case 'unset':
                unset($_SESSION[$sessionName]);
                return true;
                break;
            case 'des':
                unset($_SESSION[$sessionName]);
                session_destroy();
                return true;
                break;
            case 'isset':
                return isset($_SESSION[$sessionName]);
                break;
            case 'equal':
                return $session->equal($sessionName,$vars);
                break;
            case 'empty':
                return isset($_SESSION[$sessionName]) ? empty($_SESSION[$sessionName]) : false;
                break;
        }
    }
}