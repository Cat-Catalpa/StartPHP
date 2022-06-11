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
    global $hasBeenRun;
    $hasBeenRun['autoload'] = " - Autoload_Init";
    require_once(CONFIG."vendormap.php");
    $vendor = substr($className, 0, strpos($className, '\\'));
    global $vendormap;
    $vendor_dir = $vendormap[$vendor];
    $rel_path = dirname(str_replace("\\","/",substr($className, strlen($vendor))));
    $rel_path = $rel_path == "/" ? "" : $rel_path;
    $rel_file = basename(str_replace("\\","/",substr($className, strlen($vendor))));
    if ($vendor == "app") {
        global $url;
        if(empty($url) ? false : true == true){
            require_once(APP.$url['apppath']."/"."controller/".strtolower($rel_file).".php");
        }
        else{
            new \premodel\Error\Pre_throwError_Model("Error: Unable to get the app directory to which the controller to resolve belongs.",__FILE__,__LINE__,"EC100001");
        }
    }else{
        if ($vendor == "premodel") {
            require_once(DIR."premodel/".strtolower($rel_file).".php");
        }
        elseif($vendor == "model"){
            $file = ROOT."model/".strtolower($rel_file).".php";
            if (file_exists($file))
            {
                require_once($file);
            }
            else
            {
                new \premodel\Error\Pre_throwError_Model("Error: Error:File '$file' containing class '$className' not found",__FILE__,__LINE__,"EC100002");
            }
        }
    }
},true,true);