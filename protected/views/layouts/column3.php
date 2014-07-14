<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<!-- section  begin -->
		<head>
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/user.css">
			<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/main.js"></script>
		</head>
		<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<!--user begin-->
		<div class="user">
			<!--menu begin-->
			<div class="menu">
				<div class="menu_title">
				</div>
				<div>
					<a href="<?php echo Yii::app()->createUrl('user/index'); ?>"><div class="menu_list">我的账户</div></a>
					<a href="<?php echo $this->createUrl('user/order')?>"><div class="menu_list">我的订单</div></a>
					<a href="<?php echo Yii::app()->createUrl('user/address')?>"><div class="menu_list">我的地址</div></a>
					<a href="<?php echo $this->createUrl('user/album')?>"><div class="menu_list">我的相册</div></a>
					<a href="#"><div class="menu_list">我的朋友</div></a>
					<a href="#"><div class="menu_list">系统消息</div></a>
				</div>
			</div>
			<!--menu end-->
			<!--user_section begin-->
			<div class="all_lable">
					<?php echo $content;?>
			</div>
			<!--user_section end-->
			<!--user end-->
		</div>
	</section>
	<!-- section  end -->
<?php $this->endContent(); ?>