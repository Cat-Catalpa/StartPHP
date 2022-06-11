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
//Url信息解析

namespace premodel\ParseUrl;
class ParseUrl{
    function parse($url){
        global $env;
        $basic = $env['parse_url_controller'];
        $path = array_filter(explode("/",$url));
        $parsepath = "";
        $parsefile = "";
        $apppath = $path[1];
        $vars = array();
        $maxTime = $originMaxTime = count($path);
        $query = isset(parse_url($url)['query']) ? parse_url($url)['query'] : "";
        $isMatched = preg_match_all('/\..*/',$url,$matches);
        if ($isMatched != 0) {
            if (count($matches) > 1) {
                new \premodel\Error\Pre_throwError_Model("File name suffix jumbled",__FILE__,__LINE__,"EC100006","文件名后缀冗杂！");
            }
            if ($matches[0][0] != ".php") {
                echo file_get_contents($_SERVER["DOCUMENT_ROOT"].$url);
            }
            $date = date("Ymd-H:i:m");
            Header( "Content-type: application/octet-stream ");
            header( "Content-Disposition: attachment; filename= ".basename($url));
            Header( "Accept-Ranges: bytes ");
            readfile(ROOT.$url);
            die();
            return true;
        }
        if ($query != "") {
            parse_str($query,$vars);
            $url = substr($url,0,strpos($url,"?"));
            $path = array_filter(explode("/",$url));
            $maxTime = $originMaxTime = count($path);
        }
        if ($i = count($path) && count($path) == 1) {
            if (parse_url($url)['path'] == "/index" || parse_url($url)['path'] == "/") {
                return array("path"=>$parsepath,"file"=>"index.php","apppath" => TEMPLATENAME,"vars"=>$vars);
            }
        }
        for($i = 1; $i < $maxTime; $i++){
            if (strstr($path[$i],".php") == true && $basic == true && $i != count($path)) {
                $parsefile = $path[$i];
                $maxTime = $i;
                $params = true;
                break;
            }else{
                if ($path[$i] != "null" && $i != 1) {
                    $parsepath = $parsepath.$path[$i]."/";
                }
            }
        }
        if ($parsefile == "") {
                $parsefile = str_replace(".php","",$path[$i]).".php";
        }
        if (is_int($intercept = strpos($path[1],".php"))) {
            $apppath = substr($path[1],0,-4);
            echo $path[1]."||".$apppath;
        }
        if (isset($params)) {
            return array(
            "path" => $parsepath,
            "apppath" => $apppath,
            "file" => $parsefile,
            "ctrl" => array(
                "app"=>(isset($path[$maxTime + 1]) ? $path[$maxTime + 1] : "null") == "null" ? "" : $path[$maxTime + 1],
                "controller"=>(isset($path[$maxTime + 2]) ? $path[$maxTime + 2] : "null") == "null" ? "" : $path[$maxTime + 2],
                "func"=>(isset($path[$maxTime + 3]) ? $path[$maxTime + 3] : "null") == "null" ? "" : $path[$maxTime + 3]
            ),
            "vars" => $vars
            );
        }else{
        return array(
            "path" => $parsepath,
            "apppath" => $apppath,
            "file" => $parsefile,
            "vars" => $vars
            );
        }
    }
}