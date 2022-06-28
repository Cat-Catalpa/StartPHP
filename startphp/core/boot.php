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
//引导启动项

namespace startphp;
class Run {
    function __construct(){
        
        //记录所有输出，以便在错误捕获后清空页面所有已渲染元素
        ob_start();
        
        //定义全局变量
        global $hasBeenRun,$memoryAnalysis,$viewQueue;
        
        //记录系统运行状态
        $hasBeenRun['init'] = " - System_Init";
        
        //引入必要配置文件
        require_once dirname(__DIR__).'/../config/Config.php';
        
        //初始化路由解析机制
        $url = require_once(CORE."Router.php");
        
        //渲染页面
        global $pageContent;
        $content = $viewQueue->getMainView()->filter($pageContent)->render();
        
        //系统启动完成
        $hasBeenRun['end'] = " - System_End";
        hook_getClassName("appDestroy")->transfer([$memoryAnalysis]);
        if ($env['debug_mode']) {
            $memoryAnalysis->output();
        }
    }
}