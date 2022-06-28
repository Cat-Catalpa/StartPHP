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
//模板引擎

namespace startphp\View;

class View
{
    protected $data = [];
    protected $url = "";
    protected $files = "";
    protected $content = "";
    protected $firstRender = true;

    public function __construct()
    {
        hook_getClassName('viewInit')->transfer();
        $hasBeenRun['view'] = " - View_Init";
        
    }
    
    public function assign($key,$value){
        if (is_array($key)) {
            $this->data = array_merge($this->data,$key);
        }
        else{
            $this->data[$key] = $value;
        }
        return $this;
    }
 
    public function render($content = "")
    {
        global $env,$viewQueue;
        if($env['render_auto_clean'] && $this->firstRender) ob_clean();
        if(empty($content)) $content = $this->content;
        if(empty($content)) new \ThrowError(__FILE__,__LINE__,"EC100008");
        if($this->firstRender) $this->firstRender = false;
        if (!is_bool($name = array_search($this,$viewQueue->getQueue()))) {
            $viewQueue->set($name,$this);
        }
        hook_getClassName('brforeRender')->transfer();
        ob_start();
        echo $content;
        return $this;
    }
    
    public function toggle($cleanCache = true){
        ob_clean();
        ob_start();
        echo $this->content;
        return $this;
    }
    
    public function filter($content = ""){
        if(empty($content)) $content = $this->content;
        if(empty($content)) new \ThrowError(__FILE__,__LINE__,"EC100008");
        $parsefile = new \startphp\ParseFile\ParseFile();
        $this->content = $parsefile->parse($content,$this->data);
        return $this;
    }
    
    public function getFileContent($path,$returnContent = true){
        global $url,$env;
        $allowToLoad = false;
        $app = array_filter(explode("/",$path))[0];
        if(file_exists(APP.$app.".php")){
            $allowToLoad = empty($result = require_once(APP.$app.".php")) ? true : $result;
        }
        else{
            $allowToLoad = true;
        }
        $path = APP.$path.$env['file_suffix'];
        if($allowToLoad){
            if($returnContent) return file_get_contents($path);
            else{
                $this->content = file_get_contents($path);
                return $this;
            }
        }
        else{
            if($returnContent) return file_get_contents(TEMPLATES.$env['access_denied_page'].$env['template_suffix']);
            else{
                $this->content = file_get_contents(TEMPLATES.$env['access_denied_page'].$env['template_suffix']);
                return $this;
            }
        }
    }
    
    public function save(){
        $this->content = ob_get_clean();
        return $this;
    }
    
    public function setContent($content){
        $this->content = $content;
        return $this;
    }
}