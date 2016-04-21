<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<title></title>
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
		}
	</style>
</head>
<body>
	<section class="clear">
        <div class="tabbed_content">

			<div class="slide_content">						
				<div class="order" >
					<!-- <div>&nbsp;</div> -->
					<ul>
						<?php if(is_array($resultlist)): foreach($resultlist as $key=>$vo): ?><li>
										<div class="serve_dt_goodsinfo" style="background-color: #ffffff;border-bottom:1px solid #E3E3E3;width: 90%;margin: auto;padding-bottom: 0%;" >
											<div class="goodsimg">
												<img src="<?php echo ($vo['goods_info']['goods_image']); ?>" >
											</div>
											<div class="goodsimfo_msg">
												<div style="text-align: left;font-size: 12px;color: #666666;padding-top: 30%"><div style="color: orange;float: left">已消费:</div> ￥<?php echo ($vo['goods_info']['goods_price']); ?></div>
											</div>
											<div class="clear"></div>
										</div>
									<div class="clear"></div>
										<div class="bottom_xinxi" style="width: 96%;margin: auto;font-size: 12px;text-align: left">
											<div class="text_xixni">预约门店: <?php echo ($vo['company_name']); ?></div>
											<div class="text_xixni">地址: <?php echo ($vo['address']); ?></div>
											<div class="text_xixni">预约时间: <?php echo ($vo['sub_time']); ?></div>
											<div class="text_xixni">技师: <?php echo ($vo['staff_name']); ?></div>
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
<script type="text/javascript">/*20:3 创建于 2014-12-26*/var cpro_id = "u1879755";</script>
<!-- <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script> -->