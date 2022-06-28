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
//Facade门面机制

namespace startphp\Facade;
class Facade{
    public static function __callStatic($name,$args) {
            $className = !is_bool(container_get("facade_class")) ? container_get("facade_class") : static::setFacade();
            $class = new $className;
            return call_user_func_array([$class, $name],$args);
    }
}