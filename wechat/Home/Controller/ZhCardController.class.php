<?php
namespace Home\Controller;

use Common\Util\curl;
use Common\Util\token;
use Think\Controller;


class ZhCardController extends WxConfigController
{

    public function index(){
        $this->assign('zh', 'bg');
        $this->display();
    }


    public function datalist()
    {   // 数据遍历  ajax 下拉列表
        /*
          latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
          longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        */
        //列表类型：1：商家列表；2：服务列表；3：套餐列表；4：综合卡列表
        $type = "service/icard_list";
        if ($_GET['type'] == 2) {        // 服务
            $type = "service/service_list";
        }
        if ($_GET['type'] == 3) {     // taochang
            $type = "service/sm_list";
        }
        if ($_GET['type'] == 4) {
            $type = "service/icard_list";
        }
        $size = $_GET['pagesize'];   // 大小

        $url = BASE_URL . $type;
        $ch = new curl();
        /*price time*/

        /* $fil[0]['tag'] = 'price';
         $fil[0]['id'] = $_GET['price'];
         $fil[1]['tag'] = 'service_time';
         $fil[1]['id'] = $_GET['time'];

         $filter =  json_encode($fil); */
        $filter = $_GET['filter'];
        $param['filter'] = $filter;
        $param['price'] = $_GET['price'];     // 页数
        $param['page'] = $_GET['page'];       // 页数
        //$param['size'] = $size;
        $param['cid'] = $_GET['shi'];         // 市
        $param['did'] = $_GET['qu'];          // 区
        //$param['circle_id'] = $_POST['rid'];   // 商圈
        $param['order']= $_GET['order'];      // 排序
        $param['lng']  = $_GET['wd'];         // 纬度
        $param['lat']  = $_GET['jd'];         // 经度
        $param['bind_id']  = $_GET['bind_type'];         // 服务分类
        $param['distance'] = 1000;
        $res = $ch->http($url, $param);
        echo $res;
    }


    public function details()   // 综合卡 详情页面
    {

        $cid = $_GET['cid'];
        $url = BASE_URL . "service/icard";
        $param['card_id'] = $cid;
        $ch = new curl();
        $res = $ch->http($url, $param);

        $result = json_decode($res, true);
        //dump($result['data']);
        $this->assign('res', $result['data']);
        $this->display();
    }

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

    public function combo()
    {
        /* $access_token =get_access_token(APP_ID, APP_SECRET);
         $jsapi = get_jsapi_ticket($access_token);
         $url = "http://weixin2.900sui.com/1wechatapp/Home/ZhCard/combo.html";
         $noncestr = getRandChar(16);
         $timestamp = time();//时间戳
         $str = "jsapi_ticket=" . $jsapi . "&noncestr=" . $noncestr . "&timestamp=" . $timestamp . "&url=" . $url;
         $signature = sha1($str);

         $this->assign('jsapi', $jsapi);
         $this->assign('noncestr', $noncestr);
         $this->assign('timestamp', $timestamp);
         $this->assign('signature', $signature);

         $this->assign('hidd','none');*/
        $this->assign('tc', 'bg');
        $this->display();
    }

    public function combo_detail()
    {

        $cid = $_GET['cid'];
        $param['id'] = $cid;
        $param['type'] = 2;
        $url = BASE_URL . "service/service_good";

        $param['lat'] = $_GET['wd'];
        $param['lng'] = $_GET['jd'];

        $ch = new curl();
        $res = $ch->http($url, $param);

        $result = json_decode($res, true);

        //dump($result['data']);
        //dump($result);
        $this->assign('level', $result['data']['level']);
        $this->assign('res', $result['data']);
        $this->display();
    }

    public function service()
    {
        /* $access_token =get_access_token(APP_ID, APP_SECRET);
         //dump($access_token) ;
         $jsapi = get_jsapi_ticket($access_token);
         //随即字符串http:
         //localhost/1wechatapp/index.php/Home/ZhCard/index.html
         $url = "http://weixin2.900sui.com/1wechatapp/Home/ZhCard/serve.html";

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

        /*
         echo "js:".$jsapi.'<br>';
         echo  'no:'.$noncestr.'<br>';
         echo 'ti:'.$timestamp.'<br>';
         echo 'si:'.$signature.'<br>';
        */
        $this->assign('fw','bg');
        $this->display();

    }


    public function servicedetail()   // 服务 详情页面
    {
        //dump($_GET);
        $cid = $_GET['cid'];

        $url = BASE_URL . "service/service_good";
        $param['id'] = $cid;
        $param['type'] = 1;
        $param['lat'] = $_GET['wd'];
        $param['lng'] = $_GET['jd'];
        //$t = new token();
       // $param['token'] = $t->set_token($param);
        $ch = new curl();
        $res = $ch->http($url, $param);
        $result = json_decode($res, true);
        //dump($param);
        //dump($result);
        $this->assign('res', $result['data']);
        $this->assign('level', $result['data']['level']);
        $this->display();
    }

    public function area(){      // 地区
        $lats = $_GET['lat'];   // 经度
        $lons = $_GET['lon'];   // 维度
        $tj['location'] = $lats.','.  $lons;
        $tj['output'] = 'json';
        $url = "api.map.baidu.com/geocoder";
        $ch = new curl();
        $res = $ch->http($url,$tj);
        $result = json_decode($res, true);
        $cityname =  $result['result']['addressComponent']['province'];   // 城市名
        //dump($result);
        $arr = array('市','省');
        $city['region'] = str_replace($arr,'', $cityname);
        $path_a = "util/get_region_id";
        $url_a = BASE_URL."{$path_a}";
        $t = new token();
        $city['token'] =  $t->set_token($city);
        $res_a = $ch->http($url_a,$city);
        $result = json_decode($res_a, true);
        $reg['region_id'] = $result['data']['region_id'];
        $path_b = "util/get_region";
        $url_b = BASE_URL.$path_b;
        $reg['token'] = $t->set_token($reg);
        $res_b = $ch->http($url_b,$reg);
        //$result = json_decode($res_b, true);
        echo $res_b;
        //print_r($result);
    }

    public function shops()
    {

        /*  $access_token =get_access_token(APP_ID, APP_SECRET);
          //dump($access_token) ;
          $jsapi = get_jsapi_ticket($access_token);
          //随即字符串http:
          //localhost/1wechatapp/index.php/Home/ZhCard/index.html
          $url = "http://weixin2.900sui.com/1wechatapp/Home/ZhCard/shops.html";

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
          $this->assign('fw','bg');*/
        /*
         echo "js:".$jsapi.'<br>';
         echo  'no:'.$noncestr.'<br>';
         echo 'ti:'.$timestamp.'<br>';
         echo 'si:'.$signature.'<br>';
        */
        $this->display();

    }


    public function shopsdetail()   // 服务 详情页面
    {

        $cid = $_GET['cid'];

        $url = BASE_URL . "service/service_good";
        $param['id'] = $cid;
        $param['type'] = 1;
        $param['lat'] = $_GET['wd'];
        $param['lng'] = $_GET['jd'];

        $ch = new curl();
        $res = $ch->http($url, $param);

        $result = json_decode($res, true);
        //dump($param);
        //dump($result);
        $this->assign('res', $result['data']);
        $this->assign('level', $result['data']['level']);
        $this->display();
    }

    public function classify()
    {
        $url = BASE_URL . "service/getCategories";
        $ch = new curl();
        $res = $ch->http($url);
        //$result = json_decode($res, true);
        echo $res;
    }

    public function goodsdetail(){
        $id = $_GET['id'];
        $param['id'] = $id;
        $url = BASE_URL."goods/good";

        $ch = new curl();
        $res = $ch->http($url,$param,'get');

        $result = json_decode($res, true);

        // dump($result['data']);
        // die();
        // dump($result);
        $this->assign('res', $result['data']);
        $this->assign('info', $result['data']['user_bus']);
        $this->display();
    }

    // 排序
    public function order(){
        $ch = new curl();
        $url = BASE_URL."goods/getGoodsSort";

        $res = $ch->http($url);
        echo $res;
    }

}