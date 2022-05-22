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
//关键词编译模型
//[注意！]此模块未完全开发完成，后续版本会逐一完善！

namespace premodel\ParseFile;
class Pre_ParseFile_Model{
    public $filecontent = "";
    protected $url = array();
    
    public function parse($filecontent)
    {
        global $url;
        $this->url = $url;
        $this->filecontent = $filecontent;
        $this->parseif();
        $this->parseinclude();
        $this->parsecontroller();
        $this->parsemodel();
        $this->parsepremodel();
        $this->parsevars();
        return $this->filecontent;
    }
    
    function parseif(){
        $isMatched = preg_match('/{{if\s.+?}}[\s\S].+[\s\S]+{{\/if}}/',$this->filecontent,$matches);
    }
    
    function parseinclude(){
        $isMatched = preg_match_all('/({{include=)(.)*?(}})/',$this->filecontent,$matches);
    }
    
    function parsecontroller(){
        $isMatched = preg_match_all('/{{controller=.*?}}/',trim($this->filecontent),$matches);
        if ($isMatched != 0) {
            for ($i = 0; $i < count($matches,1)-1; $i++) {
                $funcName = preg_replace('/({{controller=)(.*?)(}})/','$2',$matches[0][$i]);
                $this->filecontent = str_replace($matches[0],"",$this->filecontent);
                $className = "\\app\\".$this->url['tplpath']."\\".ucfirst($funcName)."\\".ucfirst($funcName)."_Controller";
                $class = new $className;
                call_user_func_array(array($class, $funcName),array($this->url['vars']));
            }
        }
    }
    
    function parsemodel(){
        $isMatched = preg_match_all('/{{model=.*?}}/',trim($this->filecontent),$matches);
        if ($isMatched != 0) {
            for ($i = 0; $i < count($matches,1)-1; $i++) {
                $funcName = preg_replace('/({{model=)(.*?)(}})/','$2',$matches[0][$i]);
                $this->filecontent = str_replace($matches[0],"",$this->filecontent);
                $className = "\\model"."\\".$funcName."\\".ucfirst($funcName)."_Model";
                $class = new $className;
                call_user_func_array(array($class, $funcName),array($this->url['vars']));
            }
        }
    }
    
    function parsepremodel(){
        $isMatched = preg_match_all('/{{premodel=.*?}}/',trim($this->filecontent),$matches);
        if ($isMatched != 0) {
            for ($i = 0; $i < count($matches,1)-1; $i++) {
                $funcName = preg_replace('/({{premodel=)(.*?)(}})/','$2',$matches[0][$i]);
                $this->filecontent = str_replace($matches[0],"",$this->filecontent);
                $className = "\\premodel"."\\".$funcName."\\"."Pre_".ucfirst($funcName)."_Model";
                $class = new $className;
                call_user_func_array(array($class, $funcName),array($this->url['vars']));
            }
        }
    }
    
    function parsevars(){
        $isMatched = preg_match_all('/{{.+?}}/',$this->filecontent,$matches);
        $matched = $matches[0];
        for($i = 0;$i<count($matched);$i++){
            if (strstr($matched[$i],"%") != false) {
                $replaceText = substr($matched[$i],"3",-2);
                $this->filecontent = str_replace($matched[$i],constant(strtoupper($replaceText)),$this->filecontent);
            }else{
                $replaceText = "$".substr($matched[$i],"2",-2);
                eval("global $replaceText;");
                eval("\$replaceText = \"$replaceText\";");
                $this->filecontent = str_replace($matched[$i],$replaceText,$this->filecontent);
            }
        }
    }
}