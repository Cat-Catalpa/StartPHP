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
//自动加载机制

spl_autoload_register(function ($className) {
    ob_start();
    require_once(CONFIG."vendormap.php");
    $vendor = substr($className, 0, strpos($className, '\\'));
    global $vendormap;
    $vendor_dir = $vendormap[$vendor];
    $rel_path = dirname(str_replace("\\","/",substr($className, strlen($vendor))));
    $rel_path = $rel_path == "/" ? "" : $rel_path;
    $rel_file = basename(str_replace("\\","/",substr($className, strlen($vendor))));
    if (strpos(ucfirst($rel_file),"_Controller") == true) {
        $fileName = str_replace("_Controller","",$rel_file);
        global $url;
        if(empty($url) ? false : true == true){
            require_once(APP.$url['tplpath']."/"."controller/".strtolower($fileName).".php");
        }
        else{
            new \premodel\Error\Pre_throwError_Model("Error: Unable to get the app directory to which the controller to resolve belongs.",__FILE__,__LINE__,"EC100003","无法获取Url信息");
        }
    }else{
        if (is_int(strpos(ucfirst($rel_file),"Pre_")) == true) {
            $fileName = str_replace("Pre_","",$rel_file);
            $fileName = str_replace("_Model","",$fileName);
            require_once(DIR."premodel/".strtolower($fileName).".php");
        }
        else{
            $fileName = str_replace("_Model","",$rel_file);
            $file = ROOT."model/".strtolower($fileName).".php";
            if (file_exists($file))
            {
                require_once($file);
            }
            else
            {
                new \premodel\Error\Pre_throwError_Model("Error: Error:File '$file' containing class '$className' not found",__FILE__,__LINE__,"EC100002","要引入的文件不存在");
            }
        }
    }
});