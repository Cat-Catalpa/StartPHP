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
//控制器基类

namespace startphp\Controller;

class Controller extends \Facade {
    
    protected $version,$view,$viewQueue,$template;
    
    function __construct(){
        global $version,$viewQueue,$template;
        $this->version = $version = VERSION;
        $this->view = $viewQueue->getMainView();
        $this->viewQueue = $viewQueue;
        $this->template = $template;
    }
    
    protected function global($vars){
        return $GLOBALS[$vars];
    }
    
    protected function getFileContent($path,$returnContent = true){
        $return = $this->view->getFileContent($path,$returnContent);
        if (is_object($return)) {
            return $this;
        }
        else{
            return $return;
        }
    }
    
    protected function assign($key,$value){
        $this->view->assign($key,$value);
        return $this;
    }
    
    protected function render($content = "")
    {
        $this->view->render($content);
        return $this;
    }
    
    protected function toggle($cleanCache = true){
        $this->view->toggle($cleanCache);
        return $this;
    }
    
    protected function filter($content = ""){
        $this->view->filter($content);
        return $this;
    }
    
    protected function save(){
        $this->view->save();
        return $this;
    }
    
    protected function setContent($content){
        $this->view->setContent($content);
        return $this;
    }
    
}