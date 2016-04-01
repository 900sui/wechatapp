<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/23 0023
 * Time: 18:09
 */

namespace Home\Controller;


use Think\Controller;

class WxConfigController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $access_token = get_access_token(APP_ID, APP_SECRET);
        //dump($access_token) ;
        $jsapi = get_jsapi_ticket($access_token);
        //随即字符串http:
        //localhost/1wechatapp/index.php/Home/ZhCard/index.html
        //$url = "http://weixin2.900sui.com/1wechatapp/Home/ZhCard/index.html";
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
        /* if(!empty($_SERVER['QUERY_STRING'])){
             dump($url);
            $url.=  '?'.$_SERVER['QUERY_STRING'];
         }*/
        //error_log($url, 'error_log.log');
        $noncestr = getRandChar(16);
        //时间戳
        $timestamp = time();
        $str = "jsapi_ticket=" . $jsapi . "&noncestr=" . $noncestr . "&timestamp=" . $timestamp . "&url=" . $url;
        $signature = sha1($str);
        //dump($url);
        $this->assign('jsapi', $jsapi);
        $this->assign('noncestr', $noncestr);
        $this->assign('timestamp', $timestamp);
        $this->assign('signature', $signature);
        $this->assign("appid",APP_ID);
    }

}