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
//输出日志缓存文件

namespace startphp\Cache;

class Cache extends \Facade {
    
    //运行时间
    protected $run_time = "";
    
    //日志输出目录
    protected $save_path = CACHE;
    
    //日志输出文件
    protected $save_file = "";
    
    //输出内容
    protected $save_data = "";
    
    protected function logOut($content,$saveFile = ""){
        hook_getClassName('brforeLogWrite')->transfer([$content,$saveFile]);
        $this->runtime = date("Ym");
        $this->save_path .= $this->runtime;
        if (!is_dir($this->save_path)) {
            mkdir($this->save_path,0777,true);
        }
        if (empty($saveFile)) $saveFile = time().".log";
        $this->save_file = $this->save_path."/".$saveFile;
        $file = fopen($this->save_file,"a+");
        file_put_contents($this->save_file,$content);
    }
    
    protected function errorOut($content,$saveFile = CACHE."Error.log") {
        hook_getClassName('brforeLogWrite')->transfer([$content,$saveFile]);
        $this->runtime = date("Ym");
        $this->save_path .= $this->runtime;
        if (!is_dir($this->save_path)) {
            mkdir($this->save_path);
        }
        if(!file_exists($saveFile)) {
            file_put_contents($saveFile,"");
        }
        error_log($content, 0);
        error_log($content."\r\n"."\r\n", 3, $saveFile);
    }
    
    protected static function setFacade(){
        return '\Cache';
    }
    
    
}