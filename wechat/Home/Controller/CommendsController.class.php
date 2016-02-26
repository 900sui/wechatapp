<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/25 0025
 * Time: 14:22
 */

namespace Home\Controller;

use Think\Controller;
use Common\Util\curl;

class CommendsController extends Controller
{
    public function index()
    {
        $this->display();
    }

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
        $bus = $result->data;
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

    public function commend()
    {
        $cid = $_GET["cid"];
        //dump($cid);
        $busUrl = "http://jkd2.shutung.com:81/App/v3/Ad/commendBus";
        $goodsUrl="http://jkd2.shutung.com:81/App/v3/Ad/commendGoods";
        $safeUrl = "http://jkd2.shutung.com:81/App/v3/Ad/commendSafe";
        $uUrl = "http://jkd2.shutung.com:81/App/v3/Ad/commendU";
        $data["cid"] = $cid;
        $ch = new curl();

        //推荐服务
        $response = $ch->http($uUrl, $data);
        $u_result = json_decode($response);
        $u = $u_result->data;
        //dump($u);
        $u_container = "<div class=\"row x-row x-menu2\" >";
        if ($u_result->error == 0) {
            for ($i = 0; $i < count($u); $i++) {
                $u_container .= "<div class=\"col col-xs-4\" ><img name='"
                    . $u[$i]->type
                    . "_" . $u[$i]->target_id
                    . "'  src=" . $u[$i]->pic_path
                    . " class=\"img-responsive\"/></div>";
                //dump(($i + 1) % 3 == 0);
                if (($i + 1) % 3 == 0 && ($i + 1) < count($u)) {
                    $u_container .= "</div><div class=\"row x-row x-menu2\" >";
                }
            }
            $u_container .= "</div>";
            //dump($container);
            $this->assign("u_container", $u_container);

        } else {
            //echo $result->errorMsg;
            $this->assign("bus_container",  $u_result->errorMsg);

        }
        //推荐商户
        $response = $ch->http($busUrl, $data);
        $bus_result = json_decode($response);
        $bus = $bus_result->data;
        $bus_container = "<div class=\"row x-row x-menu2\" >";
        if ($bus_result->error == 0) {
            for ($i = 0; $i < count($bus); $i++) {
                $bus_container .= "<div class=\"col col-xs-4\" ><img name='"
                    . $bus[$i]->type
                    . "_" . $bus[$i]->target_id
                    . "'  src=" . $bus[$i]->pic_path
                    . " class=\"img-responsive\"/></div>";
                //dump(($i + 1) % 3 == 0);
                if (($i + 1) % 3 == 0 && ($i + 1) < count($bus)) {
                    $bus_container .= "</div><div  class=\"row x-row x-menu2\" >";
                }
            }
            $bus_container .= "</div>";
            //dump($container);
            $this->assign("bus_container", $bus_container);

        } else {
            //echo $result->errorMsg;
            $this->assign("bus_container",  $bus_result->errorMsg);

        }

        //推荐产品
        $response = $ch->http($goodsUrl);
        $goods_result = json_decode($response);
        $goods = $goods_result->data;
        $goods_container = "<div class=\"row x-row x-menu2\" >";
        if ($goods_result->error == 0) {
            for ($i = 0; $i < count($goods); $i++) {
                $goods_container .= "<div class=\"col col-xs-4\" ><img name='"
                    . $goods[$i]->type
                    . "_" . $goods[$i]->target_id
                    . "'  src=" . $goods[$i]->pic_path
                    . " class=\"img-responsive\"/></div>";
                //dump(($i + 1) % 3 == 0);
                if (($i + 1) % 3 == 0 && ($i + 1) < count($goods)) {
                    $goods_container .= "</div><div  class=\"row x-row x-menu2\" >";
                }
            }
            $goods_container .= "</div>";
            //dump($container);
            $this->assign("goods_container", $goods_container);

        } else {
            //echo $result->errorMsg;
            $this->assign("goods_container",  $goods_result->errorMsg);

        }

        //推荐保险
        $response = $ch->http($safeUrl);
        $safe_result = json_decode($response);
        $safe = $safe_result->data;
        $safe_container = "<div class=\"row x-row x-menu2\" >";
        if ($safe_result->error == 0) {
            for ($i = 0; $i < count($safe); $i++) {
                $safe_container .= "<div class=\"col col-xs-4\" ><img name='"
                    . $safe[$i]->type
                    . "_" . $safe[$i]->target_id
                    . "'  src=" . $safe[$i]->pic_path
                    . " class=\"img-responsive\"/></div>";
                //dump(($i + 1) % 3 == 0);
                if (($i + 1) % 3 == 0 && ($i + 1) < count($safe)) {
                    $safe_container .= "</div><div  class=\"row x-row x-menu2\" >";
                }
            }
            $safe_container .= "</div>";
            //dump($container);
            $this->assign("safe_container", $safe_container);

        } else {
            //echo $result->errorMsg;
            $this->assign("safe_container",  $safe_result->errorMsg);

        }

        $this->display();
    }
}


