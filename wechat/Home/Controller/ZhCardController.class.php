<?php
namespace Home\Controller;

use Common\Util\curl;
use Think\Controller;

class ZhCardController extends Controller
{
    public function index()
    {
        $access_token =get_access_token(APP_ID, APP_SECRET);
        //dump($access_token) ;
        $jsapi = get_jsapi_ticket($access_token);
        //随即字符串
        $url = "http://weixin2.900sui.com/wechatapp-master/Home/ZhCard";

        $noncestr = getRandChar(16);
        //时间戳
        $timestamp = time();
        $str = "jsapi_ticket=" . $jsapi . "&noncestr=" . $noncestr . "&timestamp=" . $timestamp . "&url=" . $url;
        $signature = sha1($str);

        //dump($url);exit;
        $this->assign('jsapi', $jsapi);
        $this->assign('noncestr', $noncestr);
        $this->assign('timestamp', $timestamp);
        $this->assign('signature', $signature);
        //echo $url;
        //echo 'jsp  :'.$jsapi.'<br>';
        //echo 'n  :'.$noncestr.'<br>';
        //echo 'ti  :'.$timestamp.'<br>';
        //echo 'si  :'.$signature.'<br>';

        $this->display();
    }

    public function datalist()
    {
        /*
          latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
          longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
         */

        $page = $_POST['page'];      // 页数
        $size = $_POST['pagesize'];  // 大小
        $lat = $_POST['lat'];         // 纬度
        $lon = $_POST['lon'];         // 经度


        $url = BASE_URL."service/icard_list";
        $ch = new curl();
        $param['page'] = $page;
        $param['size'] = $size;
        /* $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);*/
        $res = $ch->http($url,$param);
        //$result = json_decode($res,true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
        //dump($result['error']);
        //$results = json_encode($result,JSON_UNESCAPED_UNICODE);
        //$data['total'] = $results['total'];
        $this->ajaxReturn($res);

    }


    public function card_Details()
    {
        $cid = $_GET['cid'];
        $url = BASE_URL."service/icard";
        $param['card_id'] = $cid;
        $ch = new curl();
        $res = $ch->http($url,$param);

        $result = json_decode($res, true);
        //dump($result);
        $this->assign('res', $result['data']);
        $this->display();
    }

  /* function curlPost($url, $data, $showError = 1)
    {
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        $errorno = curl_errno($ch);
        if ($errorno) {
            return array('rt' => false, 'errorno' => $errorno);
        } else {
            $js = json_decode($tmpInfo, 1);
            if (intval($js['errcode'] == 0)) {
                return array('rt' => true, 'errorno' => 0, 'media_id' => $js['media_id'], 'msg_id' => $js['msg_id']);
            } else {
                if ($showError) {
                    $this->error('发生了Post错误：错误代码' . $js['errcode'] . ',微信返回错误信息：' . $js['errmsg']);
                }
            }
        }
    }

    function curlGet($url)
    {
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        return $temp;
    }*/

    function desc($arr)
    {
        $str = "";
        if (empty($arr)) {
            return 'GET参数出错（null）！';
        }
        sort($arr);
        foreach ($arr as $val) {
            $str .= $val;
        }
        $str = md5(md5($str) . TOKEN);
        return $str;
    }

}