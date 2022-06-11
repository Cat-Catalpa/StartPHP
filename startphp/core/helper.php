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
//框架函数全局化文件

use premodel\Session\Session;
use premodel\Redirect;
use core\dependvars;

if(!function_exists("session")){
    function session($sessionName,$value=""){
        return premodel\Session\session($sessionName,$value);
    }
}

if(!function_exists("redirect")){
    function redirect($url = "",$remember = false){
        global $redirect;
        return $redirect->redirect($url,$remember);
    }
}

if(!function_exists("redirect_backoff")){
    function redirect_backoff($remember = false){
        global $redirect;
        return $redirect->backoff($remember);
    }
}