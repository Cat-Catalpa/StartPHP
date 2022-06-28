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
//路由转发

$query_file = $_SERVER["REQUEST_URI"];
if ($query_file == "/") {
    $query_file = "/index";
}
hook_getClassName('routerInit')->transfer([$query_file]);
$hasBeenRun['router'] = " - Router_Init";
global $url,$hasBeenRun,$pageContent,$env;

$url = new \startphp\ParseUrl\ParseUrl();
$url = $url->parse($query_file);

function selectdir($dir) {
    echo $dir;
    die();
    $temp=scandir($dir);
    foreach($temp as $v){
        $a=$dir.'/'.$v;
        if(is_dir($a)){//如果是文件夹则执行
            if($v=='.' || $v=='..'){//判断是否为系统隐藏的文件.和..  如果是则跳过
                continue;
            }
            selectdir($a);//因为是文件夹所以再次调用 selectdir，把这个文件夹下的文件遍历出来
        }else{
            global $url;
            if(isset($GLOBALS[strtolower(pathinfo($v, PATHINFO_FILENAME))])){
                $GLOBALS[strtolower(pathinfo($v, PATHINFO_FILENAME))] = array_merge($GLOBALS[strtolower(pathinfo($v, PATHINFO_FILENAME))],require_once(APP.$url['app'].DS."config".DS.pathinfo($v, PATHINFO_FILENAME).".php"));
            }
            else{
                $varName = "$".strtolower(pathinfo($v, PATHINFO_FILENAME));
                $var = require_once(APP.$url['app'].DS."config".DS.pathinfo($v, PATHINFO_FILENAME).".php");
                $GLOBALS[strtolower(pathinfo($v, PATHINFO_FILENAME))] = $var;
            }
        }
    }
}

if (is_dir(APP.$url['app'].DS."config".DS)) selectdir(APP.$url['app'].DS."config".DS);
var_dump($url['path']);
require_once(APP.$url['app'].DS."controller".$url['path'].$url['controller'].".php");
$className = "\\"."app"."\\".$url["app"]."\\".$url["controller"]."\\".$url["controller"];
$class = new $className;
if (method_exists($class,$url['function'])) {
    $pageContent = call_user_func_array(array($class, $url['function']),array($url['vars']));
    if(gettype($pageContent) == "NULL"){
        new \ThrowError(__FILE__,__LINE__,"EC100009",$class."=>".$url['function']);
    }
}else{
    new \ThrowError(__FILE__,__LINE__,"EC100010",$class."=>".$url['function']);
}
hook_getClassName('afterRouter')->transfer([$query_file,$url]);
return $url;