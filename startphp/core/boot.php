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
        
        //记录系统运行状态
        global $hasBeenRun;
        $hasBeenRun['init'] = " - System_Init";
        
        //引入必要配置文件
        require_once __DIR__.'/../config/config.php';
        
        //注册调试模式控制台日志输出文件
        global $memoryAnalysis;
        $memoryAnalysis = new \premodel\DevDebug\DevDebug();
        
        //注册ORM核心操作库
        require_once(CORE."database.php");
        
        global $database;
        global $session;
        
        //注册ORM实例对象
        $database = new \startphp\Database\Database($db['dbtype'],$db['dbhost'],$db['dbname'],$db['dbuser'],$db['dbpass'],$db['dbport'],$db['dbprefix'],$db['dbfile'],$db['dbtable']);
        
        //注册异常错误捕获机制
        $error = new \premodel\Error\Error();
        $error->init();
        
        //注册函数引入文件
        require_once(CONFIG."functions.php");
        
        //注册函数全局化文件
        require_once(CORE."helper.php");
        
        //初始化路由解析机制
        require_once(CORE."router.php");
    }
}