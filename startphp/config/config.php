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
define('VERSION',"V0.5");
define('APP_NAME',"StartPHP");
define('APP_SUB_NAME',"一款轻量级、易上手、完善化的后端PHP开发框架");

//系统基础配置
define('ROOT',$_SERVER["DOCUMENT_ROOT"]."/");
define('SYSTEM_START_TIME',microtime(true));
define('SYSTEM_START_MEMORY',memory_get_usage());
define('DIR',ROOT."startphp/");
define('APP',ROOT.'app/');
define('STATIC',ROOT.'static/');
define('CACHE',DIR.'cache/');
define('CONFIG',DIR.'config/');
define('CONTROLLER',DIR.'controller/');
define('CORE',DIR.'core/');
define('LANGUAGES',DIR.'languages/');
define('MODEL',ROOT.'model/');
define('PUBLIC',ROOT.'public/');
define('PREMODEL',DIR.'premodel/');
define('HTTP',((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://');//站点http协议类型
define('SITE_DOMAIN','101.43.57.133');//站点主域名，不需要加http前缀，也不要加斜杠等后缀
define('DEFAULT_LANGUAGE','zh-cn');//默认使用的语言包

//模板引擎参数配置
define('TEMPLATENAME','index');//默认应用名称名称
define('TEMPLATE',APP.TEMPLATENAME.'/');

//引入系统必要文件
global $env;
global $db;
global $lang;
global $dependVars;
require_once(PREMODEL."autoload.php");
require_once(PREMODEL."error.php");
require_once(PREMODEL."throwerror.php");
$env = require_once(APP."env.php");
$db = require_once(CONFIG."database.php");
$lang = include_once(LANGUAGES.DEFAULT_LANGUAGE.".php");
