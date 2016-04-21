<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/30 0030
 * Time: 16:46
 */

namespace Home\Controller;


use Common\Util\curl;
use Common\Util\token;
use Think\Controller;

class TransferController extends Controller
{
    public function transferDetail(){
        $trans_id = $_GET['trans_id'];
        $goods_type = $_GET['goods_type'];
        $url = BASE_URL."transfer/getTransferDetail";
        $param['trans_id'] = $trans_id;
        $param['goods_type'] = $goods_type;
        $token = new token();
        $param['token'] = $token->set_token($param);
        $ch = new curl();
        $res = $ch->http($url,$param);
        $result = json_decode($res,true);
      // dump($result);
        if($result->error == 0){
            $this->assign('detail',$result['data']);
            $images = explode(',',$result['data']['images']);
            $this->assign('img',$images[0]);
            if($goods_type == 2){
                $this->display('iCard');
            }
            if($goods_type == 1){
                $this->display('sm_service');
            }
        }else{
            echo "<script>alert('$result->errorMsg');</script>";
        }
    }

    public function auctionDetail(){
        $trans_id = $_GET['trans_id'];
        $goods_type = $_GET['goods_type'];
        $url = BASE_URL."transfer/getAuctionDetail";
        $param['trans_id'] = $trans_id;
        $param['goods_type'] = $goods_type;
        $token = new token();
        $param['token'] = $token->set_token($param);
        $ch = new curl();
        $res = $ch->http($url,$param);
        $result = json_decode($res,true);
        //dump($result);
        if($result->error == 0){
            $this->assign('detail',$result['data']);
            $images = explode(',',$result['data']['images']);
            $this->assign('img',$images[0]);
            if($goods_type == 2){
                $this->display('iCard');
            }
            if($goods_type == 1){
                $this->display('sm_service');
            }
        }else{
            echo "<script>alert('$result->errorMsg');</script>";
        }
    }
}