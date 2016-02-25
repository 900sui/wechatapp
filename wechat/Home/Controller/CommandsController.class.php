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

class CommandsController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function bus()
    {
        $cid = $_GET["cid"];
        dump($cid);
        $url = "http://jkd2.shutung.com:81/App/v3/Ad/commendBus";

        //$data["cid"] = $cid;
        $ch = new curl();
        $response = $ch->http($url, "");

        $result = json_decode($response);
        //dump($result);
        $container = "<div class=\"row x-row x-menu2\" >";
        if ($result->error == 0) {
            foreach ($result->data as $bus) {
                $container .= "<div class=\"col col-xs-4\" ><img name='" . $bus->type . "_" . $bus->target_id . "'  src=" . $bus->pic_path . " class=\"img-responsive\"/></div>";

            }
            $container .= "</div>";
            //dump($container);
            $this->assign("container", $container);
            $this->display();
        } else {
            echo $result->errorMsg;
        }

    }
}


