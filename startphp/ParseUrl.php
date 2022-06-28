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

namespace startphp\ParseUrl;
class ParseUrl{
    function parse($url){
        global $env,$route;
        $returnInfo = array("app"=>DEFAULT_APP_NAME,"path"=>DS,"controller"=>"Index","function"=>"index","vars"=>array());
        $route = require_once(CONFIG."Route.php");
        $path = parse_url($url);
        $info = array_filter(explode("/",substr($path['path'],1)));
        foreach ($route as $key => $value){
            $array = array_filter(explode("/",$key));
            $combineKey = array_diff($array,$info);
            $continue = true;
            foreach ($combineKey as $k => $v){
                if(is_bool(strpos($v,"`"))) $continue = false;
                else $combineKey[$k] = substr($v,1);
            }
            if($continue){
                $combine = array_combine($combineKey,array_diff($info,$array));
                $returnInfo["vars"] = array_merge($returnInfo["vars"],$combine);
                $url = $value;
            }
        }
        $path = parse_url($url);
        $info = array_filter(explode("/",substr($path['path'],1)));
        isset($path['query']) ? $query = $path['query'] : $query = array();
        if(is_string($query)){
            $queryArray = array_filter(explode("&",$query));
            $query = array();
            foreach ($queryArray as $key => $value){
                $array = array_filter(explode("=",$queryArray[$key]));
                $query[$array[0]] = $array[1];
            }
        }
        $returnInfo["vars"] = array_merge($returnInfo["vars"],$query);
        if(file_exists(str_replace("/",DS,PUBLICDIR.substr($url,1)))){
            $isMatched = preg_match_all('/\..*/',$url,$matches);
            if ($isMatched != 0) {
                if (count($matches) > 1) {
                    new \throwError(__FILE__,__LINE__,"EC100006",$url);
                }
                if ($matches[0][0] == ".css" || $matches[0][0] == ".js") {
                    echo "<pre>".file_get_contents(str_replace("/",DS,PUBLICDIR.substr($url,1)))."</pre>";
                }
                else{
                    if (is_file(ROOT."public".$url)) {
                        $type = filetype(ROOT."public".$url);
                        $today = date("F j, Y, g:i a");
                        $time = time();
                        header("Content-type: $type");
                        header( "Content-Disposition: attachment; filename= ".basename($url));
                        header("Content-Transfer-Encoding: binary");
                        header('Pragma: no-cache');
                        header('Expires: 0');
                        set_time_limit(0);
                        readfile(ROOT."public".$url);
                    }
                    else {
                        var_dump(ROOT."public".$url);
                    }
                }
            }
            die();
        }
        if(count($info) == 3){
            $returnInfo["app"] = ucfirst($info[0]);
            $returnInfo["controller"] = ucfirst($info[1]);
            $returnInfo["function"] = $info[2];
        }
        elseif(count($info) > 3){
            $returnInfo["app"] = ucfirst($info[0]);
            $returnInfo["controller"] = ucfirst($info[1]);
            $returnInfo['path'] = implode(DS,array_slice($info,2,count($info)-3,true)).DS;
            $returnInfo["function"] = $info[count($info)-1];
        }
        return $returnInfo;
    }
}