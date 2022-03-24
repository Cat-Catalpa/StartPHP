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
define('VERSION',"V0.0.3");

//系统基础配置
define('ROOT',$_SERVER["DOCUMENT_ROOT"]."/");
define('DIR',ROOT."startphp/");
define('APP',ROOT.'app/');
define('ADMIN',APP.'admin/');
define('CACHE',DIR.'cache/');
define('CONFIG',DIR.'config/');
define('CONTROLLER',DIR.'controller/');
define('CORE',DIR.'core/');
define('MODEL',ROOT.'model/');
define('PREMODEL',DIR.'premodel/');
define('VENDOR',ROOT.'vendor/');
define('INSTALL',APP.'install/');
define('HTTP',((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://');//站点http协议类型
define('SITE_DOMAIN','101.43.57.133');//站点主域名，不需要加http前缀，也不要加斜杠等后缀

//数据库参数配置
define('DATABASE_TYPE','mysql');
define('DATABASE_IP','localhost');
define('DATABASE_NAME','startphp');
define('DATABASE_ROOT','startphp');
define('DATABASE_PASSWORD','');
define('DATABASE_PREFIX','StartPHP_');
define('TEMPLATENAME','index');//模板名称
define('TEMPLATE',APP.TEMPLATENAME.'/');

//引入系统必要文件
require_once(PREMODEL."error.php");
$env = require_once(CONFIG."env.php");