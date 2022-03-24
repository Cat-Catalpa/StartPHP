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
//Url信息解析

class Pre_ParseUrl_Model{
    function parse($url,$basic){
        $path = array_filter(explode("/",$url));
        $parsepath = "";
        $parsefile = "";
        $vars = array();
        $maxTime = $originMaxTime = count($path);
        $query = isset(parse_url($url)['query']) ? parse_url($url)['query'] : "";
        if ($query != "") {
            parse_str($query,$vars);
            $url = substr($url,0,strpos($url,"?"));
            $path = array_filter(explode("/",$url));
            $maxTime = $originMaxTime = count($path);
        }
        if ($i = count($path) && count($path) == 1) {
            if (parse_url($url)['path'] == "/index" || parse_url($url)['path'] == "/") {
                return array("path"=>$parsepath,"file"=>"index.php","tplpath" => TEMPLATENAME,"vars"=>$vars);
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
        if (isset($params)) {
            return array(
            "path" => $parsepath,
            "tplpath" => $path[1],
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
            "tplpath" => $path[1],
            "file" => $parsefile,
            "vars" => $vars
            );
        }
    }
}