<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/17 0017
 * Time: 14:27
 */

namespace Home\Controller;


use Common\Util\curl;
use Think\Controller;

class WechatController extends Controller
{
    public function getWechatUser()
    {
        $code = I('get.code');
        $uri = I('get.state');
        //dump($code);
        $api_url = "https://api.weixin.qq.com/sns/oauth2/access_token";
        $param['appid'] = APP_ID;
        $param['secret'] = APP_SECRET;
        $param['code'] = $code;
        $param['grant_type'] = "authorization_code";
        $ch = new curl();
        $res = $ch->http($api_url, $param);
        $result = json_decode($res);
        //dump($result->openid);
        $this->openid = $result->openid;
        //dump($this->openid);
        $_SESSION['openid'] =  $result->openid;
        $_SESSION['access_token'] =  $result->access_token;
        $this->redirect('WechatUser/isbind', '', 3, '');
    }

}