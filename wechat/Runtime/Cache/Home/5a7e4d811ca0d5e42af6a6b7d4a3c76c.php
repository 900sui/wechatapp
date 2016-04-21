<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<title>保险订单</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link type="text/css" rel="stylesheet" href="/weixindl/Public/css/2014/m/style131017.css" />
<link type="text/css" rel="stylesheet" href="/weixindl/Public/css/shop.css" />
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
				<a class="tab_item wzf"  style="width: 49%">待付款</a>
				<a class="tab_item yzf"  style="width: 49%">已支付</a>
			</div>
			<div class="slide_content">						
				<div class="order" >
					<!-- <div>&nbsp;</div> -->
					<ul>
						<?php if(is_array($resultlist)): foreach($resultlist as $key=>$vo): ?><li>
								<a href="<?php echo U('detail');?>?order_id=<?php echo ($vo['spo_id']); ?>" >
									<div class="serve_dt_header" style="border-bottom: 1px solid #E3E3E3;width: 90%;margin: auto; ">
										<div style="float: left;">订单号:</div>
										<span style="float: left;"><?php echo ($vo['order_sn']); ?></span>
										<span class="ddfk"><?php if($_GET['type'] == null): ?>未付款<?php else: ?>已出单<?php endif; ?></span>
									</div>
										<div class="serve_dt_goodsinfo" style="background-color: #ffffff;border-bottom:1px solid #E3E3E3;width: 90%;margin: auto;" >
											<div class="goodsimg">
												<img src="<?php echo ($vo['image']); ?>" >
											</div>
											<div class="goodsimfo_msg">
												<div style="text-align: left"><?php echo ($vo['pg_name']); ?></div>
												<div style="text-align: left;color: #666666;padding-top: 3%">￥<?php echo ($vo['total_price']); ?></div>
												<div style="text-align: left;font-size: 12px;color: #666666;padding-top: 3%">期限: <?php echo ($vo['start_time']); ?>至<?php echo ($vo['end_time']); ?></div>
											</div>
											<div class="clear"></div>
										</div>
									<div class="clear"></div>
										<!--<?php if($_GET['type'] == null): ?>-->
											<!--<div class="serve_dt_fotter">-->
												<!--<span class="btn pay">付款</span>-->
												<!--<span class="btn">取消订单</span>-->
											<!--</div>-->
										<!--<?php else: endif; ?>-->
								</a>
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
		$.post("<?php echo U('ajaxsafe');?>",{'type':0},function(res){
			$('.order ul').html("");
			$('.order ul').append(res);
			return false;
		})
	})
	$('.yzf').click(function(){
		$.post("<?php echo U('ajaxsafe');?>",{'type':1},function(res){
			$('.order ul').html("");
			$('.order ul').append(res);
			return false;
		})
	})
</script>
<script type="text/javascript">/*20:3 创建于 2014-12-26*/var cpro_id = "u1879755";</script>
<!-- <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script> -->