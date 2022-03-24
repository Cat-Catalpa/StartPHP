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

class Run {
    function __construct($template){
        require_once __DIR__.'/../config/config.php';
        if (empty($template)) {
            $template = TEMPLATE;
        }
        else{
            $template = APP.$template;
        }
        if (FRAME_WORK_NAME != "StartPHP") {
            die('Error: An unauthorized commercial version of the framework was used(EC100001).');
        }
        spl_autoload_register(function ($className) {
            if (strpos("_Controller",$className) == true) {
                return;
            }
            if (strpos("Pre_",$className) != -1) {
                $fileName = str_replace("Pre_","",$className);
                $fileName = str_replace("_Model","",$fileName);
                require_once(DIR."premodel/".strtolower($fileName).".php");
            }
            else{
                list($filename , $suffix) = explode('_' , $className);
                $file = ROOT . 'model/' . strtolower($filename) . '.php';
                if (file_exists($file))
                {
                    require_once($file);        
                }
                else
                {
                    die("Error:File '$file' containing class '$className' not found.(EC100002)");
                }
            }
        });
        $error = new Pre_Error_Model();
        $error->init();
        require_once(CORE."/router.php");
    }
}
?>