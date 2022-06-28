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
//容器系统

namespace startphp\Container;
class Container{
    protected $vars = array();
    
    public function bind($key,$value) {
        $this->vars[$key] = $value;
        return true;
    }
    
    
    public function get($key){
        return isset($this->vars[$key]) ? $this->vars[$key] : false;
    }
    
    public function isValueSet($value){
        return !is_bool(array_search($value,$this->vars)) ? array_search($value,$this->vars) : false;
    }
}