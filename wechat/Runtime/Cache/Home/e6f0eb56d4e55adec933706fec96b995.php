<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<title>预付卡保单</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link type="text/css" rel="stylesheet" href="/weixindl/Public/css/2014/m/style131017.css" />
<link type="text/css" rel="stylesheet" href="/weixindl/Public/css/safe.css" />
<!-- media queries css -->
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
<![endif]-->
<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]> 
	<script src="/weixindl/Public/js/2014/m/css3-mediaqueries.js"></script>
<![endif]-->
<script src="/weixindl/Public/js/jquery-1.4.2.min.js"></script>
<script src="/weixindl/Public/js/2014/m/click_more.js"></script>
<script src="/weixindl/Public/js/2014/m/tabbedContent.js"></script>
	<style type="text/css">
		li{
			background-color: #ffffff;
			padding-bottom: 5%
		}
	</style>
</head>
<body>
	<section class="clear">
        <div class="tabbed_content">
			<div class="tabs">
				<a class="tab_item wzf"  style="width: 49%" >我的服务</a>
				<a class="tab_item yzf"  style="width: 49%">综合卡</a>
			</div>
			<div class="slide_content">						
				<div class="order" >
					<!-- <div>&nbsp;</div> -->
					<ul>
						<?php if(is_array($resultlist)): foreach($resultlist as $key=>$list): ?><li>
								<div class="safedetail">
									<div class="safe_div" style="text-align: left">订单号: <?php echo ($list['order_sn']); ?></div>
									<div class="safe_div" style="text-align: left">保单号: <?php echo ($list['policy_sn']); ?></div>
									<div class="safe_div" style="text-align: left">投保时间: <?php echo ($list['ctime']); ?></div>
									<div class="safe_div">
										<div style="float: left">投保卡名: </div>
										<div style="color: #99cc33;float: left">￥<?php echo ($list['goods_name']); ?></div>
										<div style="clear: both"></div>
									</div>
									<div class="safe_div">
										<div style="float: left">保险金额: </div>
										<div style="color: #99cc33;float: left">￥<?php echo ($list['price']); ?></div>
										<div style="clear: both"></div>
									</div>
									<div class="safe_div">
										<span>温馨提示:</span>
										<span style="width: 80%;word-break:break-all"><?php echo ($list['msg']); ?></span>
										<div style="clear: both"></div>
									</div>
								</div>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<br style="clear:both" />
			</div>
			
		</div>
		
		
	
	</section>
</body>
</html>
<script type="text/javascript">
	$('.wzf').click(function(){
		$.post("<?php echo U('ajaxopen');?>",{'type':1},function(res){
			$('.order ul').html("");
			$('.order ul').append(res);
			return false;
		})
	})
	$('.yzf').click(function(){
		$.post("<?php echo U('ajaxopen');?>",{'type':2},function(res){
			$('.order ul').html("");
			$('.order ul').append(res);
			return false;
		})
	})
</script>
<script type="text/javascript">/*20:3 创建于 2014-12-26*/var cpro_id = "u1879755";</script>
<!-- <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script> -->