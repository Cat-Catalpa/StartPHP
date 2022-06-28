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
    'debug_mode' => false,   //是否开启调试模式（输出的调试数据会影响用户体验，生产环境下不建议开启）
    'session_auto_load' => false,   //是否自动开启Session，关闭后需用户手动执行session_start()函数启动Session会话
    'database_auto_load' => false,   //是否在框架初始化时自动连接数据库，如果数据库参数未配置打开此项将会报错
    'error_auto_clean' => true,   //是否在错误抛出后清空所有已输出内容（包括echo、var_dump、print_f等函数的输出结果）
    'render_auto_clean' => true,   //是否在视图渲染后清空所有已输出内容（非开发环境不建议关闭）
    'save_error_log' => true,   //是否在错误抛出后将错误详情保存至错误日志中
    'send_error_log' => false,   //是否在错误抛出后将错误详情发送至developer_email中设置的邮箱
    'developer_email' => '',   //开发者邮箱账号
    'save_running_log' => true,   //是否保存系统每次运行结果（网站每次被访问都将新建日志文件，不建议在生产环境中开启）
    'file_suffix' => '.html',   //页面文件拓展名后缀
    'template_suffix' => '.tpl',   //模板文件拓展名后缀
    'access_denied_page' => 'AccessDenied'   //应用入口文件拒绝访问后默认跳转的页面模板文件名
];