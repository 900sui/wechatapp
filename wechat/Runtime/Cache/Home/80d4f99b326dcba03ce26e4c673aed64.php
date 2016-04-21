<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/weixindl/Public/css/2014/m/style131017.css" />
    <link type="text/css" rel="stylesheet" href="/weixindl/Public/css/shop.css" />

</head>
<body>
<?php if(is_array($list['project'])): foreach($list['project'] as $key=>$v): ?><div class="serve_dt_goodsinfo1"style=" background-color: #ffffff;margin-top: 2%">
        <div class="goodsimg1">
            <img src="<?php echo ($v['image']); ?>" >
        </div>
        <div class="goodsimfo_msg1" >
            <div style="text-align: left;margin-bottom: 4%"><?php echo ($v['name']); ?></div>
            <span style="float: left">￥<?php echo ($v['price']); ?></span><span style="float: right;padding-right: 2%">×<?php echo ($v['num']); ?></span>
        </div>
        <div class="clear"></div>
        <div class="xian" ></div>
        <div style="padding:2% 0%  2%;background-color: #ffffff"><div style="float: left;width: 25%">实付款:</div><div style="float: right;width: 20%;color: #99cc33">￥<?php echo ($v['price']); ?></div><div class="clear"></div>
        </div>
    </div><?php endforeach; endif; ?>
    <div class="butt">
        <div class="text_nr">订单编号:&nbsp;<?php echo ($list['order_sn']); ?> </div>
        <div class="text_nr">下单日期:&nbsp;<?php echo ($list['ctime']); ?></div>
    </div>

</body>
</html>