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
class CardorderController extends Controller{
    public function  cardorder(){
        $url = BASE_URL . "WeiXinPublic/myIntegratedCard";
        $shop['open_id']=$_SESSION['openid'];
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