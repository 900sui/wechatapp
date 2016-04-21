<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/weixindl/Public/css/safe.css" />

</head>
<body>
<div class="safedetail">
    <div class="safe_div">订单号: <?php echo ($list['order_sn']); ?></div>
    <div class="safe_div">
        <span>保险产品:</span>
        <span style="width: 60%"><?php echo ($list['pg_name']); ?></span>
        <div style="clear: both"></div>
    </div>
    <div class="safe_div">
        <div style="float: left">保&nbsp; 险&nbsp;费: </div>
        <div style="color: #99cc33;float: left">￥<?php echo ($list['price']); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="safe_div">保险期限: <?php echo ($list['date_interval']); ?></div>
    <div class="safe_div">
        <div style="float: left">保险金额: </div>
        <div style="color: #99cc33;float: left">￥<?php echo ($list['amount']); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="safe_div">
        <div style="float: left">状态:&nbsp;</div>
        <?php if($list['status'] == 0 ): ?>未付款
        <?php else: ?>
            <div style="color: orange;float: left"> 已出单</div><?php endif; ?>
        <div style="clear: both"></div>
    </div>
    <div>
        <div class="safe_div1">投保人信息</div>
        <div class="safe_div2">
            <div class="left_safe">真实姓名</div>
            <div class="right_safe"><?php echo ($list['tname']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">身份证号</div>
            <div class="right_safe"><?php echo ($list['tcard_no']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">电话</div>
            <div class="right_safe"><?php echo ($list['ttel']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">地址</div>
            <div class="right_safe"><?php echo ($list['tcname']); echo ($list['tdname']); echo ($list['taddress']); ?></div>
        </div>
    </div>
    <div>
        <div class="safe_div1">被保人信息</div>
        <div class="safe_div2">
            <div class="left_safe">保单号</div>
            <div class="right_safe">保单号:<?php echo ($list['guards']['0']['policy_sn']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">真实姓名</div>
            <div class="right_safe"><?php echo ($list['guards']['0']['bname']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">身份证号</div>
            <div class="right_safe"><?php echo ($list['guards']['0']['bcard_no']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">电话</div>
            <div class="right_safe"><?php echo ($list['guards']['0']['btel']); ?></div>
        </div>
        <div class="safe_div2">
            <div class="left_safe">地址</div>
            <div class="right_safe"><?php echo ($list['guards']['0']['bcname']); echo ($list['guards']['0']['bdname']); echo ($list['guards']['0']['baddress']); ?></div>
        </div>
    </div>
</div>
</body>
</html>