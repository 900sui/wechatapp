<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript" src="/wechat/Public/js/jquery-1.4.2.min.js"></script>
	</head>
	<body>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			    wx.config({
			        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
			        appId: 'wxc05bf626f605c34a', // 必填，公众号的唯一标识
			        timestamp: '<?php echo ($timestamp); ?>', // 必填，生成签名的时间戳
			        nonceStr: '<?php echo ($noncestr); ?>', // 必填，生成签名的随机串
			        signature: '<?php echo ($signature); ?>',// 必填，签名，见附录1
			        jsApiList: ['getLocation'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
			    });
			    var latitude='';
			    var longitude='';
			    wx.ready(function(){
			    	wx.getLocation({
				    type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
				    success: function (res) {
				        	latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
				         	longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
				        	var speed = res.speed; // 速度，以米/每秒计
				        	var accuracy = res.accuracy; // 位置精度
				        	$.post("<?php echo U('jm');?>",{'latitude':latitude,'longitude':longitude},function(rt){
				        		var description = "";
								for(var i in rt){
						        	var property=rt[i];
						        	description+=i+" = "+property+"\n";
					    		}
					    	alert(description);
				        },"json")
				    }
				        
				});

			    
			});

		});
	</script>
</html>