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
//引导启动项

namespace startphp;
class Run {
    function __construct($app = null){
        ob_start();
        global $allowToLoad;
        $allowToLoad = true;
        require_once __DIR__.'/../config/config.php';
        if (empty($app)) {
            $app = TEMPLATE;
        }
        else{
            $app = APP.$app."/";
        }
        require_once(PREMODEL."autoload.php");
        require_once(PREMODEL."throwerror.php");
        if (FRAME_WORK_NAME != "StartPHP") {
            new \premodel\Error\Pre_throwError_Model("Error: An unauthorized commercial version of the framework was used.",__FILE__,__LINE__,"EC100001","系统版权校验失败");
        }
        require_once(CORE."database.php");
        global $database;
        $database = new \startphp\Database\Database($db['dbtype'],$db['dbhost'],$db['dbname'],$db['dbuser'],$db['dbpass'],$db['dbport'],$db['dbprefix'],$db['dbfile'],$db['dbtable']);
        $error = new \premodel\Error\Pre_Error_Model();
        $error->init();
        require_once(CORE."/router.php");
    }
}