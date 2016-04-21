<?php if (!defined('THINK_PATH')) exit(); if(is_array($resultlist)): foreach($resultlist as $key=>$vo): ?><li>
        <a href="<?php echo U('detail');?>?order_id=<?php echo ($vo['spo_id']); ?>" >
            <div class="serve_dt_header" style="border-bottom: 1px solid #E3E3E3;width: 90%;margin: auto; ">
                <div style="float: left;">订单号:</div>
                <span style="float: left;"><?php echo ($vo['order_sn']); ?></span>
                <span class="ddfk"><?php if($vo['zhifu'] == 0): ?>未付款<?php else: ?>已出单<?php endif; ?></span>
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
            <?php if($vo['zhifu'] == 0): ?><div class="serve_dt_fotter">
                    <span class="btn pay">付款</span>
                    <span class="btn">取消订单</span>
                </div>
                <?php else: endif; ?>
        </a>
    </li><?php endforeach; endif; ?>