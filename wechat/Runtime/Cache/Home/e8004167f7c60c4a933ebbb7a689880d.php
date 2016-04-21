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
    <div class="hear">
        <div class="hear_left left_name"><?php echo ($list['rname']); ?></div>
        <div class="hear_left left_phone"><?php echo ($list['phone']); ?></div>
        <div class="hear_left left_cname"><?php echo ($list['cname']); echo ($list['dname']); echo ($list['address']); ?></div>
        <div style="clear: both"></div>
    </div>
<?php if(is_array($list['goods'])): foreach($list['goods'] as $key=>$v): ?><div class="serve_dt_goodsinfo1" style=" background-color: #ffffff;">
        <div class="goodsimg1">
            <img src="<?php echo ($v['img']); ?>" >
        </div>
        <div class="goodsimfo_msg1">
            <div style="text-align: left;margin-bottom: 4%"><?php echo ($v['goods_name']); ?></div>
            <div style="float: left" >￥<?php echo ($v['total_price']); ?></div><div style="float: left;margin-left: 2%">×<?php echo ($v['num']); ?></div>
        </div>
        <div class="clear"></div>
        <div class="xian" ></div>
        <div style="padding:2% 0%  2%;"><div style="float: left;width: 35%">实付款(含运费):</div><div style="float: right;width: 20%;color: #99cc33">￥<?php echo ($list['money']); ?></div><div class="clear"></div>
        </div>
    </div><?php endforeach; endif; ?>
    <div class="butt">
        <div class="text_nr">订单编号:&nbsp;<?php echo ($list['order_sn']); ?> </div>
        <div class="text_nr">下单日期:&nbsp;<?php echo ($list['ctime']); ?></div>
    </div>

</body>
</html>