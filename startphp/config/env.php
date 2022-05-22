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
//环境变量
//[注意！]如果parse_url_controller的值为false，有时系统可能会因为url无法正确解析而报错，正常情况下建议保持此项为true！

return[
    'parse_url_controller' => true//是否解析url中的controller
    'session_auto_load' => false,   //是否自动开启Session，关闭后需用户手动执行session_start()函数启动Session会话
];