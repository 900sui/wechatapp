<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title></title>
<link rel="stylesheet" type="text/css" href="/weixindl/Public/css/m_com.17170031.css"/>
<link rel="stylesheet" type="text/css" href="/weixindl/Public/css/m_uc.17183444.css"/>
<script type="text/javascript" src="/weixindl/Public/js/jquery-1.4.2.min.js"></script>
<style type="text/css">
	.fsyzm{display: block;
	float: right;
	width: 24%;
	height: 45px;
	line-height: 45px;
	text-align: center;}
</style>
</head>
<body>

<header class="header">
	<h1 class="ui_tac">注册</h1>
	<a class="icon_home z" href="/"></a>
</header>
<form action="<?php echo U('WechatUser/reg');?>" method="post" id="reg">
	<div class="ui_rel ui_bt_d3 ui_mt30">
		<i class="icon_user"></i>
		<input class="ui_input u_f mobile" id="mobile" name="mobile" type="text" placeholder="注册手机号">
	</div>

	<div class="ui_rel ui_bt_d3" style="background: #fff">
		<i class="icon_check"></i>
		<input class="ui_input" id="code" name="code"  placeholder="验证码" style="width: 75%">
		<input type="button" class="fsyzm" value="获取验证码">
	</div>

	<div class="ui_rel ui_bt_d3 ui_bb_d3">
		<i class="icon_pw"></i>
		<input class="ui_input u_f password" id="password" type="password" placeholder="注册密码">
	</div>

	<div class="ui_tac ui_clr_666 ui_mb10 ui_mt50"></div>
	<div class="ui_pl15 ui_pr15 ui_mb10">
		<button class="ui_btn btn_blue sub" id="btnLogin">注册</button>
	</div>
</form>
<div class="ui_tar ui_pr15">
	<a href="<?php echo U('login');?>" id="btnRegister">立即登陆 &gt;</a>
</div>
<script type="text/javascript">
        $('.sub').click(function(){
            if($('.mobile').val()==''){
                alert("手机号码不能为空！");
                return false;
            }
            if($('.password').val()==''){
                alert("密码不能为空！");
                return false;
            }
            if($('.code').val()==''){
                alert("验证码不能为空");
                return false;
            }
            if($('.mobile').val()!=''){
                var reg =/^1[3|4|5|8][0-9]\d{8}$/;
                if(!reg.test($('.mobile').val())){
                    alert("手机号码格式不对！");
                    $('.mobile').val("");
                    return false;
                }else{
                    $('#reg').submit();
                }
            }
        })
        $('.fsyzm').click(function(){
                if($('.mobile').val()==''){
                    alert("手机号码不能为空！");
                    return false;
                }
                if($('.mobile').val()!='') {
                    var reg = /^1[3|4|5|8][0-9]\d{8}$/;
                    if (!reg.test($('.mobile').val())) {
                        alert("手机号码格式不对！");
                        $('.mobile').val("");
                        return false;
                    }
                }
            $.post("<?php echo U('smsCode');?>",{'mobile':$('.mobile').val()},function(res){
                alert($res);
            })
        })
    </script>
</body>
</html>