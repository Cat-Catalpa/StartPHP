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
//环境变量
//[注意！]如果parse_url_controller的值为false，有时系统可能会因为url无法正确解析而报错，正常情况下建议保持此项为true！

return[
    'parse_url_controller' => true,   //是否解析url中的controller
    'debug_mode' => true,   //是否开启调试模式（输出的调试数据会影响用户体验，生产环境下不建议开启）
    'session_auto_load' => false,   //是否自动开启Session，关闭后需用户手动执行session_start()函数启动Session会话
    'database_auto_load' => false,//是否在框架初始化时自动连接数据库，如果数据库参数未配置打开此项将会报错
];