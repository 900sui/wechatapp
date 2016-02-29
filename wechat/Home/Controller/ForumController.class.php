<?php
namespace Home\Controller;
use Think\Controller;
use Common\Util\curl;
class ForumController extends PublicController {
    public function forum(){
        $post_id=24;
        $url = "http://jkd2.shutung.com:81/App/v3/HealthBbs/postDetail";
        $ch = new curl();
        $data["post_id"]=$post_id;
        $data["token"]="607abc572ad9956bb9f4f834ef811731";
        $data["option"]="postDetail";
        $result=$ch->http($url,$data);
        $result= json_decode($result,true);
        dump($result['data']);
//        $return=$this->curlGet("http://jkd2.shutung.com:81/App/v3/service/user_bus?id=".$id);
//        $array=explode(separator,$return);
//        dump($array);die();
        $this->display();
    }
}