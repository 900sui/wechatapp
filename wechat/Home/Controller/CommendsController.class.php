<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/25 0025
 * Time: 14:22
 */

namespace Home\Controller;

use Think\Controller;
use Common\Util;

class CommendsController extends Controller
{
    public function index()
    {
        $this->display();
    }
/*
    public function bus()
    {
        $cid = $_GET["cid"];
        //dump($cid);
        $url = "http://jkd2.shutung.com:81/App/v3/Ad/commendBus";

        //$data["cid"] = $cid;
        $ch = new curl();
        $response = $ch->http($url, "");

        $result = json_decode($response);
        //dump($result);
        $bus = $result;
        //dump(count($bus));
        $container = "<div class=\"row x-row x-menu2\" >";
        if ($result->error == 0) {
            for ($i = 0; $i < count($bus); $i++) {
                $container .= "<div class=\"col col-xs-4\" ><img name='"
                    . $bus[$i]->type
                    . "_" . $bus[$i]->target_id
                    . "'  src=" . $bus[$i]->pic_path
                    . " class=\"img-responsive\"/></div>";
                //dump(($i + 1) % 3 == 0);
                if (($i + 1) % 3 == 0 && ($i + 1) < count($bus)) {
                    $container .= "</div><div  class=\"row x-row x-menu2\" >";
                }
            }
            $container .= "</div>";
            //dump($container);
            $this->assign("container", $container);
            $this->display();
        } else {
            echo $result->errorMsg;
        }
    }
*/
    public function commend()
    {
        $cid = $_GET["cid"];
        $t = new Util\token();
        $token = $t->set_token($_GET);
        //dump($cid);
        $busUrl = "http://jkd2.shutung.com:81/App/v3/Ad/commendBus";
        $goodsUrl="http://jkd2.shutung.com:81/App/v3/Ad/commendGoods";
        $safeUrl = "http://jkd2.shutung.com:81/App/v3/Ad/commendSafe";
        $uUrl = "http://jkd2.shutung.com:81/App/v3/Ad/commendU";
        $data["cid"] = $cid;
        $data['token'] = $token;
        $ch = new Util\curl();

        //推荐服务
        $response = $ch->http($uUrl, $data);
        $u_result = json_decode($response);
        $u = $u_result->data;
        //dump($u);

        if ($u_result->error == 0) {
            //dump($container);
            $this->assign("u_container", $u);

        }
        //推荐商户
        $response = $ch->http($busUrl, $data);
        $bus_result = json_decode($response);
        $bus = $bus_result->data;
        if ($bus_result->error == 0) {
            //dump($container);
            $this->assign("bus_container", $bus);
        }

        //推荐产品
        $response = $ch->http($goodsUrl);
        $goods_result = json_decode($response);
        $goods = $goods_result->data;

        if ($goods_result->error == 0) {

            //dump($container);
            $this->assign("goods_container", $goods);

        }

        //推荐保险
        $response = $ch->http($safeUrl);
        $safe_result = json_decode($response);
        $safe = $safe_result->data;

        //dump($safe);
        if ($safe_result->error == 0) {

            //dump($container);
            $this->assign("safe_container", $safe);

        }

        $this->display();
    }
}


