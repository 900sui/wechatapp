<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/4 0004
 * Time: 11:18
 */
define("BASE_URL","http://jkd2.shutung.com:81/App/v3/");
define("APP_ID","wx1c7041549642a8d9");
define("APP_SECRET","56fbf00030edf74af5d44083329db84f");

function getRandChar($length)
{
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;

    for ($i = 0; $i < $length; $i++) {
        $str .= $strPol[rand(0, $max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
    }

    return $str;
}

function get_access_token($appid, $appscret)
{
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $appscret;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //相当关键，这句话是让curl_exec($ch)返回的结果可以进行赋值给其他的变量进行，json的数据操作，如果没有这句话，则curl返回的数据不可以进行人为的去操作（如json_decode等格式操作）
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $res = curl_exec($ch);
    //$res = file_get_contents($token_access_url); //获取文件内容或获取网络请求的内容
    //echo $res;
    $result = json_decode($res, true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
    return $result['access_token'];
}

function get_jsapi_ticket($access_token)
{

    $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=" . $access_token . "&type=jsapi";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //相当关键，这句话是让curl_exec($ch)返回的结果可以进行赋值给其他的变量进行，json的数据操作，如果没有这句话，则curl返回的数据不可以进行人为的去操作（如json_decode等格式操作）
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $res = curl_exec($ch);


    //$res = file_get_contents($token_access_url); //获取文件内容或获取网络请求的内容
    //echo $res;
    $result = json_decode($res, true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量

    return $result['ticket'];
}