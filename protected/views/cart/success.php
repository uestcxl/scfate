<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/shopping.css">
</head>
	<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<div class="shopping_state">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/shopping_stateThree.png">
		</div>
		<div class="shopping_ok_concent">
			<div class="state">
				<img src="<?php echo Yii::app()->baseUrl?>/html/img/avatar.png">
				<div>
					<p class="title">订单提交成功!</p>
					<p>您的订单已成功生成，选择您想用的方式支付</p>
				</div>
			</div>
			<div class="all">
				<span>到我的个人中心：<span class="_red"><a href="<?php echo $this->createUrl('user/order')?>">查看</a></span></span>
				<span>订总价：<span class="_red">￥<?php if(isset($_COOKIE['total'])) echo $_COOKIE['total']?></span></span>
			</div>		
		</div>
	</section>
	<!-- section  end -->