<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/25 0025
 * Time: 13:59
 */

namespace Home\Controller;


use Common\Util\curl;
use Think\Controller;

class ServiceListController extends Controller
{
    public function listFilter(){

        $url = BASE_URL."/service/getServiceListFilter";
        //列表类型：1：商家列表；2：服务列表；3：套餐列表；4：综合卡列表
        $param['service_type'] = $_GET['type'];
        $ch = new curl();
        $res = $ch->http($url,$param);
        $this->ajaxReturn($res);

    }
    public function listSort(){

        $url = BASE_URL."service/getServiceListSort";
        //列表类型：1：商家列表；2：服务列表；3：套餐列表；4：综合卡列表;5:未认证商家
        $param['service_type'] = $_GET['type'];
        $ch = new curl();
        $res = $ch->http($url,$param);
        $this->ajaxReturn($res);

    }

}