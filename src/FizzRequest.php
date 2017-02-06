<?php
namespace Fizzday\FizzRequest;

/**
 * 简单HTTP请求封装类
 * Class FizzRequest
 */
class FizzRequest
{
    protected static $all=array();
    /**
     * 所有
     * @return array
     */
    public static function all()
    {
        parse_str(file_get_contents('php://input'), $data);
        // 安全过滤
        if (!empty($data) && !get_magic_quotes_gpc()) {
            $data = self::Add_S($data);
        }

        $all = self::$all;
        self::$all = array_merge($_GET, $_POST, $data, $all);

        return self::$all;
    }

    /**
     * 单个参数
     * @param string $param
     * @return array|mixed
     */
    public static function input($param = '')
    {
        $all = self::all();
        if ($param) return trim($all[$param]);
        else return $all;
    }

    /**
     * 请求方式
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function __get($param = '')
    {
        return self::input($param);
    }

    public function __set($name, $value)
    {
        self::$all[$name] = $value;
    }

    /**
     * 安全过滤
     * @param $array
     */
    private static function Add_S(&$array){
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (!is_array($value)) {
                    $array[$key] = addslashes($value);
                } else {
                    self::Add_S($array[$key]);
                }
            }
        }
    }
}


//$res = FizzRequest::input('a');
//$req = new FizzRequest();
//$req->dd = 'ddddd';
//$res = $req->all();
////$res = FizzRequest::method();
//print_r($res);
