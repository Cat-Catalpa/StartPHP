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
//View队列

namespace startphp\ViewQueue;

class ViewQueue
{
    protected $queue = [];
    protected $mainView;
    protected $viewName;
    
    function __construct(\View $view,$name){
        $this->queue[$name] = $view;
        $this->mainView = $view;
    }
    
    public function get($name){
        return $this->queue[$name];
    }
    
    public function getQueue(){
        return $this->queue;
    }
    
    public function getMainView(){
        return $this->mainView;
    }
    
    public function getViewName($view,$returnSelf = false){
        if ($returnSelf) {
            $this->viewName = array_search($view,$queue);
            return $this;
        }
        return array_search($view,$queue);
    }
    
    public function getView($name){
        return $this->queue[$name];
    }
    
    public function create($name){
        $this->queue[$name] = new \View();
    }
    
    public function set($name,$view){
        $this->queue[$name] = $view;
        return isset($this->queue[$name]);
    }
    
    public function setMainViewByObject($view){
        $this->mainView = $view;
        return $this->mainView == $view;
    }
    
    public function setMainViewByName($name){
        $this->mainView = !is_bool($result = array_search($name,$this->queue)) ? $result : new \ThrowError(__FILE__,__LINE__,"EC100011",$name);
        return true;
    }
    
    public function toggle($targetView){
        $this->getMainView()->save();
        $this->mainView = $targetView;
        $targetView->toggle();
    }
    
    public function delete($name = ""){
        if (empty($name)) $name = $this->viewName;
        if (empty($name)) new \ThrowError(__FILE__,__LINE__,"EC1000012");
        unset($this->queue[$name]);
    }
}