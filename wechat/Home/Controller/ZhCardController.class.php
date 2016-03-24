<?php
namespace Home\Controller;

use Common\Util\curl;
use Think\Controller;


class ZhCardController extends WxConfigController
{


    public function datalist(){   // 数据遍历  ajax 下拉列表
        /*
          latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
          longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        */
        $type = "service/icard_list";
        if($_GET['type']=='fw'){        // 服务
             $type = "service/service_list";
        } 
        if($_GET['type']=='tc'){     // taochang
            $type = "service/sm_list";
        }
        $size = $_GET['pagesize'];   // 大小

        $url = BASE_URL.$type;
        $ch = new curl();
        /*price time*/
        
        $fil[0]['tag'] = 'price'; 
        $fil[0]['id'] = $_GET['price'];
        $fil[1]['tag'] = 'service_time'; 
        $fil[1]['id'] = $_GET['time'];
        
        $filter =  json_encode($fil); 
        $param['filter'] = $filter;
       
        $param['price'] = $_GET['price'];     // 页数
        $param['page'] = $_GET['page'];       // 页数
        //$param['size'] = $size;
        $param['cid'] = 321;
        $param['order']= $_GET['order'];      // 排序
        $param['lng']  = $_GET['wd'];         // 纬度
        $param['lat']  = $_GET['jd'];         // 经度
        $param['distance'] = 1000;
        $res = $ch->http($url,$param);
        echo $res;
    }


    public function details()   // 综合卡 详情页面
    {   
       
        $cid = $_GET['cid'];
        $url = BASE_URL."service/icard";
        $param['card_id'] = $cid;
        $ch = new curl();
        $res = $ch->http($url,$param);

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

     public function combo(){
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
        $this->assign('tc','bg');
        $this->assign('hidd','none');*/
        $this->display();
     }

     public function combo_detail(){

        $cid = $_GET['cid'];
        $param['id'] = $cid;
        $param['type'] = 2;
        $url = BASE_URL."service/service_good";
       
        $param['lat'] = $_GET['wd'];
        $param['lng'] = $_GET['jd'];
       
        $ch = new curl();
        $res = $ch->http($url,$param);

        $result = json_decode($res, true);

        //dump($result['data']);
         //dump($result);
        $this->assign('level', $result['data']['level']);
        $this->assign('res', $result['data']);
        $this->display();
     }
     public function service(){
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
        $this->assign('fw','bg');*/
       /* 
        echo "js:".$jsapi.'<br>';
        echo  'no:'.$noncestr.'<br>';
        echo 'ti:'.$timestamp.'<br>';
        echo 'si:'.$signature.'<br>';
       */
        $this->display();

     }


    public function servicedetail()   // 服务 详情页面
    {   
       
        $cid = $_GET['cid'];

        $url = BASE_URL."service/service_good";
        $param['id'] = $cid;
        $param['type'] = 1;
        $param['lat'] = $_GET['wd'];
        $param['lng'] = $_GET['jd'];

        $ch = new curl();
        $res = $ch->http($url,$param);
        $result = json_decode($res, true);
        //dump($param);
        //dump($result);
        $this->assign('res', $result['data']);
        $this->assign('level', $result['data']['level']);
        $this->display();
    }

     public function shops(){

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

        $url = BASE_URL."service/service_good";
        $param['id'] = $cid;
        $param['type'] = 1;
        $param['lat'] = $_GET['wd'];
        $param['lng'] = $_GET['jd'];

        $ch = new curl();
        $res = $ch->http($url,$param);

        $result = json_decode($res, true);
        //dump($param);
        //dump($result);
        $this->assign('res', $result['data']);
        $this->assign('level', $result['data']['level']);
        $this->display();
    }

    public function classify(){
        $url = BASE_URL."service/getCategories";
        $ch = new curl();
        $res = $ch->http($url);
        $result = json_decode($res, true);
        echo $result;
    }

}