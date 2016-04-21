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
class  ShoporderController extends Controller{
    public function  shoporder(){
        $url = BASE_URL . "WeiXinPublic/myGoodsOrderList";
        $shop['open_id']=$_SESSION['openid'];
        if($_GET['type']==1){
            $shop['has_paid']=1;
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
    public function detail(){
        $data['order_id']=$_GET['order_id'];
        $data['open_id']=$_SESSION['openid'];
        $url = BASE_URL . "WeiXinPublic/myGoodsOrderDetail";
        $ch = new curl();
        $res = $ch->http($url, $data,'POST');
        $result = json_decode($res,true);
        $list=$result['data'];
        $this->assign('list',$list);
        $this->display();
    }
    public function  ajaxshop(){
        $url = BASE_URL . "WeiXinPublic/myGoodsOrderList";
        $shop['open_id']=$_SESSION['openid'];
        $shop['has_paid']=$_POST['type'];
        $ch = new curl();
        $res = $ch->http($url, $shop,'POST');
        $result = json_decode($res,true);
        foreach($result['data'] as $k =>$v){
            $resultlist[$k]=$v;
            $resultlist[$k]['goods_count']=count($resultlist[$k]['goods']);
            $resultlist[$k]['zhifu']=$_POST['type'];
        };
        $this->assign('resultlist',$resultlist);
        $this->display();
    }
}