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
</head>
<body>
	<section class="clear">
        <div class="tabbed_content">

			<div class="slide_content">						
				<div class="order" >
					<!-- <div>&nbsp;</div> -->
					<ul>
						<?php if(is_array($resultlist)): foreach($resultlist as $key=>$v): ?><li>
										<div class="serve_dt_goodsinfo">
											<div class="goodsimg">
												<img src="<?php echo ($v['img']); ?>" >
											</div>
											<div class="goodsimfo_msg">
												<div style="text-align: left"><?php echo ($v['card_name']); ?></div>
												<div style="text-align: left">总额: ￥<?php echo ($v['real_price']); ?></div>
												<div style="text-align: left">剩余: ￥<?php echo ($v['surplus_price']); ?></div>
											</div>
											<div class="clear"></div>
											<div class="xian"></div>
										</div>
									<div class="clear"></div>
											<div class="serve_dt_fotter">
												<span class="btn pay" style="color: orange ">换购服务</span>
												<span class="btn" style="color:#99cc33">转让</span>
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