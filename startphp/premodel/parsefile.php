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
//[注意！]此模块未完全开发完成，后续版本会逐一完善，目前仅支持调用变量与常量！

class Pre_ParseFile_Model{
    public $filecontent = "";
    public function parse($filecontent)
    {
        $this->filecontent = $filecontent;
        $this->parsevars();
        $this->parseif();
        $this->parseinclude();
        return $this->filecontent;
    }
    function parsevars(){
        $isMatched = preg_match_all('{{[^ /]+}}',$this->filecontent,$matches);
        $matched = $matches[0];
        for($i = 0;$i<count($matched);$i++){
            if (strstr($matched[$i],"%") != false) {
                $replaceText = substr($matched[$i],"3",-2);
                $this->filecontent = str_replace($matched[$i],constant(strtoupper($replaceText)),$this->filecontent);
            }else{
                $replaceText = "$".substr($matched[$i],"2",-2);
                eval("\$replaceText = \"$replaceText\";");
                $this->filecontent = str_replace($matched[$i],$replaceText,$this->filecontent);
            }
            //var_dump($matched);
        }
    }
    function parseif(){
        $isMatched = preg_match('/{{if\s.+?}}[\s\S].+[\s\S]+{{\/if}}/',$this->filecontent,$matches);
    }
    function parseinclude(){
        
    }
}