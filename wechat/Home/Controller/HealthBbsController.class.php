<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/29 0029
 * Time: 13:27
 */
namespace Home\Controller;

use Think\Controller;
use Common\Util;


class HealthBbsController extends Controller
{
    public function detail()
    {
        $t = new Util\token();
        $token = $t->set_token($_GET);
        $post_id = I('get.post_id');

        $url = BASE_URL . "HealthBbs/postDetail";
        $data['post_id'] = $post_id;
        $data['token'] = $token;

        $ch = new Util\curl();
        $result = $ch->http($url, $data);
        $result = json_decode($result);

        if ($result->error == 0) {
            $comment = $result->data;
            dump($comment);
            $this->assign('icon', $comment->poster_icon);
            $this->assign('title', $comment->title);
            $this->assign('poster', $comment->poster);
            $this->assign('create_time', $comment->create_time);
            $this->assign('list', $comment->content);
            $this->display();
        } else {
            echo "<script>alert('$result->errorMsg');</script>";
        }
    }

    public function healthNews()
    {
        $url = BASE_URL . "news/media_focus";
        $param['id'] = $_GET['id'];
        $token = new Util\token();
        $param['token'] = $token->set_token($param);
        $ch = new Util\curl();
        $res = $ch->http($url, $param);
        $result = json_decode($res);
        if ($result->error == 0) {
            $this->assign('title',$result->data->title);
            $this->assign('content',$result->data->content);
            $this->assign('summary',$result->data->summary);
            $this->assign('img',$result->data->img);
            $this->display();
        } else {
            echo "<script>alert('$result->errorMsg');</script>";
        }
    }
}