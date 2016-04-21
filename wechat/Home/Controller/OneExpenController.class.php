<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/1 0001
 * Time: 10:19
 */

namespace Home\Controller;


use Common\Util\curl;
use Common\Util\token;
use Think\Controller;

class OneExpenController extends Controller
{
    public function oneExpenDetail()
    {

        $url = BASE_URL . "OneExpen/goodsDetail";
        $param['goodsId'] = $_GET['goodsid'];
        $token = new token();
        $param['token'] = $token->set_token($param);
        $ch = new curl();
        $res = $ch->http($url, $param);
        $result = json_decode($res, true);

        if ($result->error == 0) {
            $this->assign('goods', $result['data']);
            $this->display();
        } else {
            echo "<script>alert('$result->errorMsg');</script>";
        }

    }

}