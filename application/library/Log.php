<?php
/**
*
*   @copyright  Copyright (c) 2014 Yuri Zhang (http://www.yurilab.com)
*   All rights reserved
*
*   file:           Log.php
*   description:     日志记录实用工具
*
*   @author Yuri
*   @license Apache v2 License
*
**/

/**
*  记录日志实用工具
*/
class  Log
{
    private static $baseInfo = '';
    private static $noticeBuffer = '';
    private static $visitBuffer = array();

    function __construct()
    {
    }

    function __destruct()
    {
        self::_writeLog('NOTICE', self::$noticeBuffer);
    }

    /**
     * 初始化函数，设定普通日志的基础信息
     * @return void 无返回值
     */
    public static function init()
    {
        self::$baseInfo  = "time[". date("Y-m-d H:i:s") ."] ";
        self::$baseInfo .= "method[".$_SERVER['REQUEST_METHOD']."] ";
        self::$baseInfo .= "remoteIP[".$_SERVER['REMOTE_ADDR']."] ";
        self::$baseInfo .= "requestURI[".$_SERVER['REQUEST_URI']."] ";

        self::$noticeBuffer = '[NOTICE] '. self::$baseInfo;


        $keys = array('REMOTE_ADDR', 'REQUEST_METHOD', 'REQUEST_URI', "HTTP_USER_AGENT");
        foreach ($keys as $key) {
            $server[$key] = $_SERVER[$key];
        }
        $server['REQUEST_TIME'] = date('Y-m-d H:i:s');
        $server['PARAM'] = array_merge($_GET, $_POST);
        self::$visitBuffer['server'] = $server;
    }

    /**
     * 增加最外层一项
     * @param string     $key   键值
     * @param mixed $value 可以是一个数组，也可以是一个字符串
     */ 
    public static function addVisitLog($key, $value)
    {
        if ($key == 'server') {
            $value = is_array($value) ? $value : array($value);
            $server = array_merge(self::$visitBuffer['server'], $value);
            self::$visitBuffer['server'] = $server;
        } else {
            self::$visitBuffer = array_merge(array($key => $value), self::$visitBuffer);
        }
    }

    /**
     * 写入自定义日志
     * @param string $filename 日志文件名
     * @param array $array    日志数据数组，每一个元素为一行
     */
    public static function addLog($filename, $array)
    {
        $default = array('error','warning','notice');
        if (in_array(strtolower($filename), $default)) {//不允许使用Custom方式写入错误日志
            return false;
        }

        if (is_array($array)) {
            $content = implode(PHP_EOL, $array);
        }
        else {
            $content = $array;
        }
        $content = trim($content);

        return self::_writeLog($filename, $content);
    }

    /**
     * 读取日志
     * @param  string  $filename 文件名
     * @param  integer $limit    读取行数
     * @return array            日志内容，每一行为数组中每一项
     */
    public static function readLog($filename, $limit = 100)
    {
        $file = SERVER_ROOT . 'log/' . Yaf_Dispatcher::getInstance()->getRequest()->getQuery('module','index') . "/" . strtolower($filename) . ".log";
        if (!file_exists($file)) {
            return false;
        }
        $command = sprintf("tail %s --lines=%d", $file, $limit);//从后往前读$file文件取$limit行
        $pipe = popen($command, 'r');
        $buffer = array();
        while ($line = fgets($pipe)) {
            $buffer[] = $line;
        }
        pclose($pipe);
        return $buffer;
    }

    /**
     * 添加Notice日志
     * 当$key和$value都被使用时，在日志的Buffer中添加一个项，在框架结束后被写入日志
     * 当省略$value时，立刻写入一次Notice日志，内容为$key的值
     * @param string $key   键名
     * @param string $value 键值
     */
    public static function addNotice($key = '',$value = NULL)
    {
        if ($value === NULL) {
            $head = '[NOTICE] '. self::$baseInfo;
            $content = $head . $key;

            self::_writeLog('NOTICE',$content);
            return true;
        }

        return self::$noticeBuffer .= $key . "[{$value}] ";
    }

    /**
     * 写入警告日志
     * @param bool $log 写入状态
     */
    public static function addWarning($log)
    {
        $head = '[WARNING] '. self::$baseInfo;
        $content = $head . $log;

        return self::_writeLog('WARNING',$content);
    }

    /**
     * 写入错误日志
     * @param bool $log 写入状态
     */
    public static function addErr($log)
    {
        $head = '[ERROR] '. self::$baseInfo;
        $content = $head . $log;

        return self::_writeLog('ERROR',$content);
    }

    /**
     * 写入文件
     * @param  string $level 日志文件名
     * @param  string $log   日志内容
     * @return bool        写入状态
     */
    private static function _writeLog($level = '', $log = '')
    {
        $logDir = APP_PATH . '/log/' . Yaf_Dispatcher::getInstance()->getRequest()->getQuery('module','index');
        if(!is_dir($logDir)){
            mkdir($logDir);
        }

        $file = $logDir . "/" . strtolower($level) . ".log";

        $fp = fopen($file, 'a');

        if (!$fp) {
            return false;
        }

        if (flock($fp, LOCK_EX)) {
            fwrite($fp, $log . PHP_EOL);
            flock($fp, LOCK_UN);//释放锁定
        }
        else {
            Log::addErr('can`t lock file!');
        }
        fclose($fp);
        return true;
    }
}

?>
