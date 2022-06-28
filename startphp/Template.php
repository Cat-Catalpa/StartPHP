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
//模板基类

namespace startphp\Template;

class Template {
    public function getTemplateContent($fileName,$returnContent = true){
        global $env;
        $path = TEMPLATES.$fileName.$env['template_suffix'];
        if($returnContent) return file_get_contents($path);
        else{
            $this->content = file_get_contents($path);
            return $this;
        }
    }
}