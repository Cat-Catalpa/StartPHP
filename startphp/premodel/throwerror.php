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
//错误输出模型

namespace premodel\Error;
class Pre_throwError_Model{
    function __construct($errstr,$errfile,$errline,$errorcode="System Error",$errtitle="系统因错误意外终止",$errno=2,$array = ""){
        ob_clean();
        echo("<head>
        <title>".$errtitle."</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">
        <style>
        body{
            color: #333;
            margin: 0;padding: 0 20px 20px;
            word-break: break-word;
            font: 14px Verdana, 'Helvetica Neue', helvetica, Arial, 'Microsoft YaHei', sans-serif;
            margin-top: 20px;
            line-height: 30px;
        }
        h1{
            margin: 10px 0 0;
            font-size: 28px;
            font-weight: 500;
            line-height: 32px;
        }
        .detailed{
            border-top: 1px solid #eee;
        }
        </style>
        </head>");
        echo("<body style=\"\">");
        echo("<h1>".$errtitle."</h1>"."<p style='line-height:20px'>[错误等级：".$errno."]<br>[错误代码：".$errorcode."]<br>[错误时间：".date('Y-m-d H:i:s')."]</p>");
        echo("<div class=\"detailed\">");
        echo("<h3>错误原因：<br></h3><p>".$errstr."</p>");
        echo("</div>");
        echo("<div class=\"detailed\">");
        echo("<h3>错误位置：<br></h3><p><u>".$errfile."</u> 第 <b>".$errline."</b> 行</p>");
        echo("</div>");
        echo("<div class=\"detailed\">");
        echo("<h3>堆栈追踪：<br></h3>");
        echo("<div style='line-height:20px'>");
        echo "<pre>".htmlspecialchars(print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), true))."</pre>";
        echo("</div>");
        echo("</div>");
        echo("</body>");
        exit();
    }
}