<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/7 0007
 * Time: 11:42
 */

namespace Home\Controller;


use Common\Util\curl;
use Common\Util\token;
use Think\Controller;

class WechatUserController extends Controller
{

    private $openid;
    private $access_token;
    //private $appid = "wx1c7041549642a8d9";
    //private $secret = "56fbf00030edf74af5d44083329db84f";

    public function _initialize()
    {
        $this->openid = $_SESSION["openid"];
        $this->access_token = $_SESSION["access_token"];
        //dump(ACTION_NAME);die();
        if (empty($this->openid) || empty($this->access_token)) {
            redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1c7041549642a8d9".
            "&redirect_uri=http%3a%2f%2fweixin2.900sui.com%2fwechatapp%2fHome%2fWechat%2fgetWechatUser&".
            "response_type=code&scope=snsapi_userinfo&state=".ACTION_NAME."#wechat_redirect");
        }

    }



    //判断是否绑定
    public function isBind()
    {
        $url = BASE_URL . "ThirdParty/weixinPublic";
        $param['open_id'] = $this->openid;
        $ch = new curl();
        $res = $ch->http($url, $param);
        $result = json_decode($res);
        //$result['token'];
        dump($result->data->request);
        if ($result->error == 0) {
            if (isset($result->data->request)) {
                $this->redirect('WechatUser/loginUser', '', 3, '请先绑定数据');
            } else {
                dump($result);
            }
        } else {
            echo "<script>alert(" . $result->errorMsg . ")</script>";
        }
    }

    //微信公众号绑定
    public function bindUser()
    {
        /* $url = BASE_URL . "ThirdParty/bindForWeiXinPublic";
         $param['open_id'] = "oq5bfs2tD_-aInMNecyTOD5DJylg";
         $param['phone'] = I('post.mobile');
         $param['password'] = I('post.password');
         $t = new token();
         $param['token'] = $t->set_token($param);
         $ch = new curl();
         $res = $ch->http($url, $param,'POST');*/
        dump($_SESSION['openid']);
        dump($this->openid);
        dump($_GET);
        $this->display();
    }

    //短信验证码
    public function smsCode()
    {
        //echo I('post.mobile');
        /* $url = BASE_URL . "util/sms";
         $param['mobile'] = I('post.mobile');
         $ch = new curl();
         $res = $ch->http($url, $param);*/

        echo $this->openid;
    }


}