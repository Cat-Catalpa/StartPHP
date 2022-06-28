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
//首页默认调用的controller

namespace app\Index\Index;
class Index extends \Controller {
        public function index($vars = array()) {
            $this->version;
            return $this->assign("version",VERSION)->getFileContent('Index/index');
        }
}