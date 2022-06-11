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
//系统预置函数引入文件

//引入与注册Session操作库
global $session;
require_once(PREMODEL."session.php");
$session = new \premodel\Session\Session();

//引入与注册重定向操作函数
global $redirect;
require_once(PREMODEL."redirect.php");
$redirect = new \premodel\Redirect\Redirect();