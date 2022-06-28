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
//框架基础配置

//框架参数配置
define('FRAME_WORK_NAME','StartPHP');
define('VERSION',"0.6");
define('APP_NAME',"StartPHP");
define('APP_SUB_NAME',"一款轻量级、易上手、完善化的后端PHP开发框架");

//系统基础配置
if(php_sapi_name() != "cli") {
    define('ROOT',dirname($_SERVER["DOCUMENT_ROOT"]).DIRECTORY_SEPARATOR);
    
}
else {
    define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR);
}
define('SYSTEM_START_TIME',microtime(true));
define('SYSTEM_START_MEMORY',memory_get_usage());
define('DS',DIRECTORY_SEPARATOR);
define('DIR',ROOT."startphp".DS);
define('APP',ROOT.'app'.DS);
define('STATIC',ROOT.'static'.DS);
define('PUBLICDIR',ROOT.'public'.DS);
define('CACHE',PUBLICDIR.'cache'.DS);
define('CONFIG',ROOT.'config'.DS);
define('CONTROLLER',DIR.'controller'.DS);
define('CORE',DIR.'core'.DS);
define('LANGUAGES',DIR.'languages'.DS);
define('MODEL',ROOT.'model'.DS);
define('TEMPLATES',PUBLICDIR.'templates'.DS);
define('HTTP',((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://');//站点http协议类型
define('SITE_DOMAIN','101.43.57.133');//站点主域名，不需要加http前缀，也不要加斜杠等后缀
define('DEFAULT_LANGUAGE','zh-cn');//默认使用的语言包

//模板引擎参数配置
define('DEFAULT_APP_NAME','Index');//默认应用名称名称
define('DEFAULT_APP',APP.DEFAULT_APP_NAME.''.DS);

//定义全局变量
global $env,$db,$hook,$lang,$container,$classalias,$cache,$view,$hookClass,$memoryAnalysis,$database,$session,$redirect,$controller,$cache,$viewQueue,$template;
$env = require_once(CONFIG."Env.php");
$db = require_once(CONFIG."Database.php");
$hook = include_once(CONFIG."Hook.php");
$lang = include_once(LANGUAGES.DEFAULT_LANGUAGE.".php");
if(php_sapi_name() != "cli") {
    $classalias = require_once(CONFIG."Classalias.php");
    require_once(CORE."View.php");
    require_once(DIR."ViewQueue.php");
    require_once(DIR."Error.php");
    require_once(DIR."ThrowError.php");
    require_once(DIR."Hook.php");
    require_once(DIR."DevDebug.php");
    include_once(DIR."Container.php");
    require_once(DIR."Autoload.php");
    $container = new \Container();
    $hookClass = new \Hook();
    require_once(CORE."Helper.php");
    require_once(DIR."Session.php");
    require_once(DIR."Redirect.php");
    require_once(CORE."Database.php");
    require_once(DIR."Facade.php");
    $cache = include_once(DIR."Log.php");
    require_once(DIR."Controller.php");
    include(DIR."Template.php");
    hook_getClassName('appInit')->transfer();
    $memoryAnalysis = new \startphp\DevDebug\DevDebug();
    $database = new \Database($db['dbtype'],$db['dbhost'],$db['dbname'],$db['dbuser'],$db['dbpass'],$db['dbport'],$db['dbprefix'],$db['dbfile'],$db['dbtable']);
    $error = new \startphp\Error\Error();
    $error->init();
    $view = new \View();
    $viewQueue = new \ViewQueue($view,"systemView");
    $session = new \Session();
    $redirect = new \Redirect();
    $controller = new \startphp\Controller\Controller();
    $cache = new \Cache();
    $template = new \Template();
}