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
class  ExperienceController extends Controller{
    public function  experience(){
        $url = BASE_URL . "WeiXinPublic/myExperience";
        $shop['open_id']=$_SESSION['openid'];
        $shop['has_paid']=1;
        $ch = new curl();
        $res = $ch->http($url, $shop,'POST');
        $result = json_decode($res,true);
        foreach($result['data'] as $k =>$v){
            $resultlist[$k]=$v;
            $resultlist[$k]['goods_count']=count($resultlist[$k]['goods']);
        };
        $this->assign('resultlist',$resultlist);
        $this->display();
    }
}