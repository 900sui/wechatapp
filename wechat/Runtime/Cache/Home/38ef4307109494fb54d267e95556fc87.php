<?php if (!defined('THINK_PATH')) exit(); if(is_array($resultlist)): foreach($resultlist as $key=>$vo): ?><li>
        <a href="<?php echo U('detail');?>?order_id=<?php echo ($vo['order_id']); ?>">
            <div class="serve_dt_header">
                <span style="float: left;width: 25px"><img src="/weixindl/Public//images/icon/home.png"></span>
                <span style="float: left;"><?php echo ($vo['user_bus']['shop_name']); ?></span>
                <span class="ddfk"><?php if($vo['zhifu'] == 0): ?>等待付款<?php else: ?> 已付款<?php endif; ?></span>
            </div>
            <?php if(is_array($vo['goods'])): foreach($vo['goods'] as $key=>$v): ?><div class="serve_dt_goodsinfo">
                    <div class="goodsimg">
                        <img src="<?php echo ($v['img']); ?>" >
                    </div>
                    <div class="goodsimfo_msg">
                        <div style="text-align: left;font-size: 12px;"><?php echo ($v['name']); ?></div>
                        <div style="text-align: left;font-size: 12px;"><?php echo (subtext($v['short_name'],14)); ?></div>
                        <div style="text-align: left;font-size: 12px;">￥<?php echo ($v['buy_price']); ?>&nbsp;&nbsp;&nbsp;<?php echo ($v['num']); ?>次</div>
                    </div>
                    <div class="clear"></div>
                </div><?php endforeach; endif; ?>
            <div class="serve_dt_fotter">
                <span>共<?php echo ($vo['goods_count']); ?>件商品&nbsp;&nbsp;合计：￥<?php echo ($vo['money']); ?></span>
            </div>
            <div class="clear"></div>
            <?php if($vo['zhifu'] == 0): ?><div class="serve_dt_fotter">
                    <span class="btn pay">付款</span>
                    <span class="btn">取消订单</span>
                </div>
                <?php else: endif; ?>
        </a>
    </li><?php endforeach; endif; ?>