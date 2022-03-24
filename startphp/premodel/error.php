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


class Pre_Error_Model{
    public static function runError($errno, $errstr,$errfile,$errline){
        die("<b>[StartPHP]RunError</b> [errorLevel:$errno]<br> <b>Detailed</b>: $errstr on $errfile line $errline");
        return true;
    }
    public function init(){
        error_reporting(E_ALL);
        set_error_handler([__CLASS__, "runError"]);
    }
}