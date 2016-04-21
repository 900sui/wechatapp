<?php if (!defined('THINK_PATH')) exit(); if(is_array($resultlist)): foreach($resultlist as $key=>$list): ?><li>
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