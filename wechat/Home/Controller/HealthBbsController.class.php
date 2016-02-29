<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/29 0029
 * Time: 13:27
 */
namespace Home\Controller;

use Think\Controller;
use Common\Util\curl;
class HealthBbsController extends Controller
{
    public function detail(){

        $post_id=I('get.post_id');
        $url = "http://jkd2.shutung.com:81/App/v3/HealthBbs/postDetail";
        $data['post_id']=$post_id;
        $ch = new curl();
        $result = $ch->http($url,$data);
        $result = json_decode($result);
        //dump($result);
        if($result->error == 0){
            $comment = $result->data;
           //dump($comment);
            $this->assign('icon',$comment->poster_icon);
            $this->assign('title',$comment->title);
            $this->assign('poster',$comment->poster);
            $this->assign('create_time',$comment->create_time);
            //dump($comment->content);
            $this->assign('list',$comment->content);
            //$this->assign('comment',$comment);
            $this->display();
        }else{
            echo "<script>alert('$result->errorMsg');</script>";
        }

    }
}