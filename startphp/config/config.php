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
//框架基础配置

//框架参数配置
define('FRAME_WORK_NAME','StartPHP');
define('VERSION',"V0.4");
define('APP_NAME',"StartPHP");
define('APP_SUB_NAME',"一款轻量级、易上手、完善化的后端PHP开发框架");

//系统基础配置
define('ROOT',$_SERVER["DOCUMENT_ROOT"]."/");
define('DIR',ROOT."startphp/");
define('APP',ROOT.'app/');
define('STATIC',ROOT.'static/');
define('ADMIN',APP.'admin/');
define('CACHE',DIR.'cache/');
define('CONFIG',DIR.'config/');
define('CONTROLLER',DIR.'controller/');
define('CORE',DIR.'core/');
define('MODEL',ROOT.'model/');
define('PREMODEL',DIR.'premodel/');
define('VENDOR',DIR.'vendor/');
define('INSTALL',APP.'install/');
define('COMPOSER',VENDOR.'composer/');
define('HTTP',((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://');//站点http协议类型
define('SITE_DOMAIN','101.43.57.133');//站点主域名，不需要加http前缀，也不要加斜杠等后缀

//模板引擎参数配置
define('TEMPLATENAME','index');//默认应用名称名称
define('TEMPLATE',APP.TEMPLATENAME.'/');

//引入系统必要文件
global $env;
global $db;
require_once(PREMODEL."error.php");
$env = require_once(CONFIG."env.php");
$db = require_once(CONFIG."database.php");
require_once(CONFIG."composer.php");
require_once(CONFIG."vars.php");