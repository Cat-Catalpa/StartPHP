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
//自动加载机制

spl_autoload_register(function ($className) {
    global $hasBeenRun,$classalias;
    $hasBeenRun['autoload'] = " - Autoload_Init";
    require_once(CONFIG."Vendormap.php");
    if (isset($classalias[$className]) && !empty($classalias[$className])) {
        return class_alias($classalias[$className],$className,false);
    }
    global $vendormap;
    $vendor = substr($className, 0, strpos($className, '\\'));
    if(empty($vendor)) new \ThrowError(__FILE__,__LINE__,"EC100013",$className);
    $vendor_dir = isset($vendormap[$vendor]) ? $vendormap[$vendor] : new \ThrowError(__FILE__,__LINE__,"EC100014",$vendor);
    $rel_path = dirname(str_replace("\\","/",substr($className, strlen($vendor))));
    $rel_path = $rel_path == "/" ? "" : $rel_path;
    $rel_file = basename(str_replace("\\","/",substr($className, strlen($vendor))));
    if ($vendor == "app") {
        global $url;
        if(empty($url)){
            require_once(APP.$url['apppath']."/"."controller/".$rel_file.".php");
        }
        else{
            $path = explode("\\",$className);
            $file_path = $vendor_dir.$path[1]."/controller/".$path[count($path)-1].".php";
            if (is_file($file_path)) require_once($file_path);
            else new \ThrowError("Error: Unable to get the app directory to which the controller to resolve belongs.<br>File Name : $file_path",__FILE__,__LINE__,"EC100001");
        }
    }else{
        if ($vendor == "startphp") {
            require_once(DIR.$rel_file.".php");
        }
        elseif($vendor == "model"){
            $file = ROOT."model/".$rel_file.".php";
            if (file_exists($file))
            {
                require_once($file);
            }
            else
            {
                new \ThrowError("Error: Error:File '$file' containing class '$className' not found",__FILE__,__LINE__,"EC100002");
            }
        }
    }
    if(!defined('FIRST_TRANSFER_AUTOLOAD')) define('FIRST_TRANSFER_AUTOLOAD',0);
    else{
        hook_getClassName('afterAutoload')->transfer([$className,$rel_file]);
    }
    
},true,true);
register_shutdown_function(function (){
    global $env;
    if($env['save_running_log']){
        global $hasBeenRun;
        global $runningResult;
        if(!isset($runningResult)) $runningResult = '成功';
        $Detail = "[ StartPHP ".VERSION." ] \r\n 执行时间： ".date('Y-m-d H:i:s')."\r\n 运行结果： ".$runningResult." \r\n User-Agent： ".$_SERVER['HTTP_USER_AGENT'];
        \Cache::logOut($Detail);
        $hasBeenRun['run_end'] = " - System_Run_End";
        hook_getClassName('appDestroy')->transfer();
    }
});