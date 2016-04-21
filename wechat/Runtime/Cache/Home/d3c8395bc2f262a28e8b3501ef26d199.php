<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<meta property="wb:webmaster" content="a4f355093baa17ab" />
<link rel="shortcut icon" type="image/x-icon" href="http://www.bitauto.com/favicon.ico" />
<link rel="icon" type="image/x-icon" href="http://www.bitauto.com/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/weixindl/Public/css/mystyle.css" media="all" /> 
<title>
个人中心
</title>
</head>
<body>    
    <span id="yicheAnchor" name="yicheAnchor" style="display:block; height:0; width:0; line-height:0; font-size:0"></span>
    <div class="mbt-page">
    <script type="text/javascript" src="http://image.bitautoimg.com/uimg/wap/js/jquery-1.8.0.min.js"></script>
        <!-- header end -->
        <div class="clear"></div>
        <!--顶部 end-->
    <div class="uc-index">
        <!--内容 Begin-->
        <div class="user-center">
            <img src="/weixindl/Public/images/bg.jpg" class="bg" alt="" />
            <!--用户信息 Begin-->

        <div class="content">
            <div class="face-box">
                <div class="img-box" style="margin: auto">
                    <?php if($_SESSION['data']['avatar'] != null ): ?><img src="<?php echo ($_SESSION['data']['avatar']); ?>"  alt="<?php echo ($_SESSION['data']['nick']); ?>" /><?php else: ?>  <img src="/weixindl/Public/images/timg.jpg"  alt="<?php echo ($_SESSION['data']['nick']); ?>" /><?php endif; ?>

                </div>
            </div>
            <div class="clear"></div>
            <h3><?php echo ($_SESSION['data']['nick']); ?></h3>
        </div>

            <div class="user-center-bottom">
                <ul>
                    <li>
                        <a class="remove-a" href="<?php echo U('Saasorder/saasreserve');?>">
                            <h5>&nbsp;</h5>
                            <em>预约服务</em>
                        </a>
                    </li>
                    <li>
                        <a class="remove-a" href="<?php echo U('Reserve/reserve');?>">
                            <h5>&nbsp;</h5>
                            <em>预约记录</em>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Openpolicy/openpolicy');?>">
                            <h5>&nbsp;</h5>
                            <em>预付卡保单</em>
                        </a>
                    </li>
                </ul>
            </div>
            <!--用户信息 End-->
        </div>
        <div class="user-center-information">
            <ul class="sort3">
                <li>
                    <a href="<?php echo U('Saasorder/saasorder');?>">
                        <i class="message"></i>
                        <span>服务订单</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Shoporder/shoporder');?>">
                        <i class="bbs"></i>
                        <span>商品订单</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Safeorder/safeorder');?>">
                        <i class="ask"></i>
                        <span>保险订单</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Cardorder/cardorder');?>">
                        <i class="ask"></i>
                        <span>我的卡包</span>
                    </a>
                </li>
            </ul>  
            <ul class="sort3">
                <!--<li>-->
                    <!--<a href="http://i.m.yiche.com/u13185774/!forum/FavoriteForums/">-->
                        <!--<i class="favorites"></i>-->
                        <!--<span>活动奖品</span>-->
                    <!--</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="http://i.m.yiche.com/u13185774/car/">-->
                        <!--<i class="cars"></i>-->
                        <!--<span>转让管理</span>-->
                    <!--</a>-->
                <!--</li>-->
                <li>
                    <a href="http://i.m.yiche.com/u13185774/!ask/t0/">
                        <i class="ask"></i>
                        <span>体验管理</span>
                    </a>
                </li>
                <li>

                </li>
            </ul>
                
                    <!--<ul class="sort3">-->
                    <!--<li><a href="http://i.m.yiche.com/u13185774/!yanghu/dingdan/"><i class="conserve">-->
                        <!--</i> <span>-->
                            <!--我的养护</span> </a></li>-->
                    <!---->
                    <!---->
                <!---->
                    <!---->
                    <!--<li><a href="http://i.m.yiche.com/u13185774/!giftshop/convert.html"><i class="buy">-->
                        <!--</i> <span>-->
                            <!--车币商城</span> </a></li>-->
                    <!--<li>-->
                        <!--<a href="http://i.m.yiche.com/u13185774/coupon/">-->
                            <!--<i class="coupon"></i>-->
                            <!--<span>我的优惠券</span>-->
                        <!--</a>-->
                    <!--</li>-->
                    <!---->
                    <!--</ul>-->
        </div>
        <div id="guessContainer" class="uc-news-list"></div>
        
        <!--内容 End-->
    </div>

        <!-- footer start utf8-->
        <!--201501_移动站_公共页底-->
        <!--content-->
<!--App download-->
<div id="app_download" style="display:none">
 <ins id="div_bea0bd64-f25e-4e5b-be82-fa0a5f19908d" type="ad_play" adplay_IP="" adplay_AreaName=""  adplay_CityName=""    adplay_BrandID=""  adplay_BrandName=""  adplay_BrandType=""  adplay_BlockCode="bea0bd64-f25e-4e5b-be82-fa0a5f19908d"> </ins>
</div>
<script src="http://image.bitautoimg.com/wap/js/DownloadPriceApp2015.7.28.js"></script>
<script>
DownloadPriceApp.init('app_download', 'closedPriceApp');
</script>


    
    
   
</body>
</html>