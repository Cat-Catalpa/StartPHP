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

namespace premodel\view;

class View
{
    private $data = array();
    private $files = "";
    private $render = false;
    private $tpl = "";

    public function __construct($url,$tplpath)
    {
        $this->data = $url;
        $this->files =  APP.$tplpath.$this->data['path'].$this->data['file'];
    }
 
    public function __destruct()
    {
        global $env;
        $data = $this->data;
        global $hasBeenRun;
        $parsefile = new \premodel\ParseFile\ParseFile();
        echo $content = $parsefile->parse(fread(fopen($this->files,"r"),filesize($this->files)));
        $hasBeenRun['view'] = " - View_Init";
        $hasBeenRun['end'] = " - System_End";
        if ($env['debug_mode']) {
            global $memoryAnalysis;
            $memoryAnalysis->output();
        }
    }
}