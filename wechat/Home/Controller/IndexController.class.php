<?php
namespace Home\Controller;
use Common\Util\token;
use Think\Controller;
class IndexController extends Controller
{
	public function index()
	{
		$access_token = get_access_token("wxc05bf626f605c34a", "2acccece9df8635e4dfe5dc5bf98ec92");
		$jsapi = get_jsapi_ticket($access_token);
		//随即字符串
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		$url = dirname($url) . $_SERVER["QUERY_STRING"] . '/';
		$noncestr = getRandChar(16);
		//时间戳
		$timestamp = time();
		$str = "jsapi_ticket=" . $jsapi . "&noncestr=" . $noncestr . "&timestamp=" . $timestamp . "&url=" . $url;
		$signature = sha1($str);
		//dump($url);
		//dump($url);exit;
		$this->assign('jsapi', $jsapi);
		$this->assign('noncestr', $noncestr);
		$this->assign('timestamp', $timestamp);
		$this->assign('signature', $signature);
		$this->display();
	}

	public function jm()
	{
		$data['lng'] = $_POST['latitude'];
		$data['lat'] = $_POST['longitude'];
		$data['distance'] = 1000;
		$t = new token();
		$token = $t->set_token($data);

		//$return = $this->curlGet("http://jkd2.shutung.com:81/App/v3/service/business_list?lng=" . $data['lng'] . "&lat=" . $data['lat'] . "&distance=" . $data['distance'] . "&token=" . $token);
		//dump($return);die();
		$this->ajaxReturn("http://jkd2.shutung.com:81/App/v3/service/business_list?lng=" . $data['lng'] . "&lat=" . $data['lat'] . "&distance=" . $data['distance'] . "&token=" . $token);
	}
}