<?php
// +----------------------------------------------------------------------
// | StartPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 Cat Catalpa Vitality All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: company@catcatalpa.com
// +----------------------------------------------------------------------
//错误捕捉模型

namespace premodel\Error;

class Pre_Error_Model{
    
    protected $throwError;
    
    public static function runError($errno = 2,$errstr = 'Undefined Error',$errfile = 'Undefined Error',$errline = 0){
      $throwError = new Pre_throwError_Model($errstr,$errfile,$errline,$errorcode="System Error",$errtitle="系统因错误意外终止",$errno=2);
        return true;
    }
    public static function runException($e){
        $errstr = $e->getMessage();
        $errfile = $e->getFile();
        $errline = $e->getLine();
        $errno = $e->getCode();
        $errTrace = $e->getTrace();
        $throwError = new Pre_throwError_Model($errstr,$errfile,$errline,$errorcode="System Exception",$errtitle="系统因错误意外终止",$errno=2);
        return true;
    }
    public static function appShutdown(){
        if (!is_null($error = error_get_last()) && self::isFatal($error['type'])) {
            self::runError( $error['type'], $error['message'], $error['file'], $error['line']);
        }
    }
    protected static function isFatal($type)
    {
        return in_array($type, [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE]);
    }
    public function init(){
        error_reporting(E_ALL);
        set_error_handler([__CLASS__, "runError"]);
        set_exception_handler([__CLASS__, "runException"]);
        register_shutdown_function([__CLASS__, "appShutdown"]);
    }
}