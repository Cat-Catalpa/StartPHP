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
//输出系统运行情况

namespace premodel\DevDebug;
class DevDebug{
    
    public function format_bytes($size, $delimiter = '') {
      $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
      for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
      return round($size, 2) . $delimiter ." ".$units[$i];
    }
    
    public function output(){
        global $lang;
        global $hasBeenRun;
        $runtime = number_format(microtime(true) - SYSTEM_START_TIME, 10, '.', '') * 1000;
        $reqs    = $runtime > 0 ? number_format(1 / $runtime, 2) : '∞';
        $mem     = number_format((memory_get_usage() - SYSTEM_START_MEMORY) / 1024, 2);
        if (isset($_SERVER['HTTP_HOST'])) {
            $uri = $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REQUEST_METHOD'] . ' : ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        } else {
            $uri = 'cmd:' . implode(' ', $_SERVER['argv']);
        }
        echo "<script>";
        echo "var cpu = []
        ";
        foreach(getrusage() as $key => $value){
            echo "cpu['$key'] = $value
            ";
        }
        echo "console.log(\"";
        echo "      ·".$lang['system_operation']."·      \\n\\n";
        echo "-----------".$lang['system']."-----------\\n";
        echo $lang['running_time']."：$runtime ms  [".$lang['throughput']."：".$reqs." req/s]\\n";
        echo $lang['require_info']."：".date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . ' ' . $uri."\\n";
        echo $lang['system_version']."：".php_uname("a")."\\n";
        echo $lang['framework_version']."：".VERSION."\\n";
        echo $lang['php_version']."：".phpversion()."\\n";
        echo $lang['zend_version']."：".zend_version()."\\n";
        echo $lang['interface_type']."：".php_sapi_name()."\\n";
        echo $lang['process_id']."：".getmypid()."\\n";
        echo $lang['index_node']."：".getmyinode()."\\n";
        if (session_id()) {
        echo "SessionID：".session_id()."\\n\\n";
        }
        else{
            echo "SessionID：NULL\\n\\n";
        }
        echo "-----------".$lang['memory']."-----------\\n";
        echo $lang['initial_memory']."：".$this->format_bytes(SYSTEM_START_MEMORY)."\\n";
        echo $lang['current_state']."：".$this->format_bytes(memory_get_usage())."\\n";
        echo $lang['total_consumption']."：".$this->format_bytes($mem)."\\n";
        echo $lang['peak_occupancy']."：".$this->format_bytes(memory_get_peak_usage())."\\n\\n";
        echo "-----------CPU-----------\\n";
        echo $lang['cpu_state']."：\",cpu,\"\\n";
        echo "-----------".$lang['has_been_run']."-----------\\n";
        echo implode("\\n",$hasBeenRun)."\\n";
        echo "----------------------"."\\n"."Powered By StartPHP"."\")</script>";
    }
}