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
//路由转发

$query_file = $_SERVER["REQUEST_URI"];
if ($query_file == "/") {
    $query_file = "/index";
}
$url = new Pre_ParseUrl_Model();
$url = $url->parse($query_file,$env['parse_url_controller']);
if (!empty($url['ctrl'])) {
    $ctrl = $url['ctrl'];
    require_once(APP.$ctrl['app']."/"."controller/".$ctrl['controller'].".php");
    $name = ucwords($ctrl['controller'])."_Controller";
    $controller = new $name;
    $controller = call_user_func_array(array($controller,$ctrl["func"]),array($url["vars"]));
}
$view = new View_Model($url,$url['tplpath']."/");