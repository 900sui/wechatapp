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
class  OpenpolicyController extends Controller{
    public function  openpolicy(){
        $url = BASE_URL . "WeiXinPublic/mySafeList";
        $shop['open_id']=$_SESSION['openid'];
        if($_GET['type']==1){
            $shop['type']=2;
        }
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
    public function  ajaxopen(){
        $url = BASE_URL . "WeiXinPublic/mySafeList";
        $shop['open_id']=$_SESSION['openid'];
        $shop['type']=$_POST['type'];
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