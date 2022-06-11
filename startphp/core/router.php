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

namespace startphp\router;
$query_file = $_SERVER["REQUEST_URI"];
if ($query_file == "/") {
    $query_file = "/index";
}
global $url;
global $hasBeenRun;
$hasBeenRun['router'] = " - Router_Init";
$url = new \premodel\ParseUrl\ParseUrl();
$url = $url->parse($query_file,$env['parse_url_controller']);
if (!empty($url['ctrl'])) {
    $ctrl = $url['ctrl'];
    $name = "\\app\\".$ctrl['controller']."\\".ucfirst($ctrl['controller'])."\\".ucfirst($ctrl['controller'])."_Controller";
    $controller = new $name;
    $controller = call_user_func_array(array($controller,$ctrl["func"]),array($url["vars"]));
}
if (is_file(APP.$url['apppath'].".php")) {
    require_once(APP.$url['apppath'].".php");
}
$view = new \premodel\view\View($url,$url['apppath']."/");