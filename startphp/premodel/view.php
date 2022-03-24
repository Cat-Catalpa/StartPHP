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
//模板引擎

class View_Model
{
    private $data = array();
    private $files = "";
    private $render = false;
    private $tpl = "";

    public function __construct($url,$tplpath)
    {
        $this->data = $url;
        $this->files =  APP.$tplpath.$this->data['path'].$this->data['file'];
        $this->tpl = CACHE."default.php";
    }
 
    public function __destruct()
    {
        $data = $this->data;
        $parsefile = new Pre_ParseFile_Model();
        echo $content = $parsefile->parse(fread(fopen($this->files,"r"),filesize($this->files)));
    }
}