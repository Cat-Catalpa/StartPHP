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
//重定向函数文件

namespace premodel\Redirect;

class Redirect {
    public function redirect($targetUrl,$remember = false){
        ob_end_clean();
        if ($remember) {
            global $url;
            setcookie("lastRedirectUrl",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        }
        header("Location: ".$targetUrl);
    }
    public function backoff($remember = false) {
        $this->redirect($_COOKIE['lastRedirectUrl'],$remember);
    }
}