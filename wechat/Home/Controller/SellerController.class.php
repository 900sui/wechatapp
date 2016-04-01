<?php
namespace Home\Controller;
use Think\Controller;
use Common\Util\curl;
class SellerController extends Controller {
    public function seller(){
        
        $id=$_GET['id'];
       
        $type = "service/user_bus";
        $url = BASE_URL."{$type}";
        $ch = new curl();
        $data["id"]=$id;
        $result=$ch->http($url,$data);
        $result= json_decode($result,ture);
        if(!empty($result['data']['score']['star'])) {
            $scores = round(floatval($result['data']['score']['star']));
            $pl = '';
            for ($i = 0; $i < $scores; $i++) {
                $pl .= '★';
            }
            for ($j = 0; $j < 5 - $scores; $j++) {
                $pl .= '☆';
            }
            $result['data']['score']['star']=$pl;
        }else{
            $result['data']['score']['star']='☆☆☆☆☆';
        }

        $this->assign('result',$result);
        //dump($result['data']);
        $this->display();
    }
    function curlGet($url){
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
    }
    public function  profile(){
        $id=$_GET['id'];
        $shop_id=$_GET['staff_id'];
       
        $type = "service/bus_staff";
        $url = BASE_URL."{$type}";
        $ch = new curl();
        $data["shop_id"]=$id;
        $result=$ch->http($url,$data);
        $result= json_decode($result,ture);
        $arrty=array();
        foreach($result['data'] as $k=>$v){
            if($v['staff_id'] == $shop_id){
                $arrty=$v;
                $scores=round(floatval($v['score']));
                $pl='';
                for ($i=0; $i <$scores ; $i++) {
                    $pl.='★';
                }
                for ($j=0; $j <5-$scores ; $j++) {
                    $pl.='☆';
                }
                $arrty['score']=$pl;
            }
        }
     //dump($arrty);
        $this->assign('arrty',$arrty);
        $this->display();
    }
}