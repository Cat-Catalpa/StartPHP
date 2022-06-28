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

if(!function_exists("session")){
    function session($sessionName,$value=""){
        return \session($sessionName,$value);
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

if(!function_exists("depend_bind")){
    function depend_bind($key,$value){
        global $dependVars;
        return $dependVars->bind($key,$value);
    }
}

if(!function_exists("container_get")){
    function container_get($key){
        global $container;
        return $container->get($key);
    }
}

if(!function_exists("container_isValueSet")){
    function container_isValueSet($value){
        global $container;
        return $container->isValueSet($value);
    }
}

if(!function_exists("hook_transfer")){
    function hook_transfer($className = "" ,$functionName = "" ,$args = ""){
        global $hookClass;
        return $hookClass->transfer($className,$functionName,$args);
    }
}

if(!function_exists("hook_getClassName")){
    function hook_getClassName($hookName,$returnString = false){
        global $hookClass;
        return $hookClass->getClassName($hookName,$returnString);
    }
}

if(!function_exists("hook_bind")){
    function hook_bind($hookName,$className){
        global $hookClass;
        return $hookClass->bind($hookName,$className);
    }
}