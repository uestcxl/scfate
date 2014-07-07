<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/index.css">
</head>
<body>
	<!-- header  begin -->
	<header>
		<!-- about login information  begin -->
		<div class="all_login">
			<p>
				<?php if (!Yii::app()->user->isGuest) { ?>
					<span>欢迎您，<?php echo Yii::app()->user->name;?></span>
					<span><a href="<?php echo Yii::app()->createUrl('user/index')?>">|&nbsp;个人中心</a></span>
					<span><a href="shopping.html">|&nbsp;购物车</a></span>
					<span><a href="<?php echo Yii::app()->createUrl('site/logout')?>">|&nbsp;退出</a></span>
				<?php  } else{?>
				<span style="font-size: 14px"><a href="<?php echo Yii::app()->createUrl('site/login')?>">登陆</a>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('user/create')?>">注册</a></span>
				<?php }?>
			</p>
		</div>
		<!-- about login information  end -->

		<!-- logo&search  begin -->
		<div class="all_logoAndsearch">
			<div class="logo">
				<a href="<?php echo Yii::app()->createUrl('site/index')?>"><img src="<?php echo Yii::app()->baseUrl?>/html/img/LOGO.png"></a>
			</div>
			<div class="search">
				<form>
					<a><img src="<?php echo Yii::app()->baseUrl?>/html/img/FDJ.png"></a>
					<span>搜索</span>
					<input type="text">
				</form>
			</div>
		</div>
		<!-- logo&search  end -->

		<!--navigation begin-->
		<div class="navigation">
			<div>
				<span><a href="<?php echo Yii::app()->createUrl('site/index')?>">网站主页</a></span>
				<span><a href="works.html">作品展示</a></span>
				<span><a href="rent.html">服饰租赁</a></span>
				<span><a href="souvenir.html">纪念礼品</a></span>
				<span><a href="about.html">关于我们</a></span>
			</div>
		</div>
	</header>
	<!-- header  end -->
<?php echo $content;?>
	<!-- section  begin -->
	<!-- section  end -->
	<!-- footer  begin -->
	<footer>
		<p>友情链接</p>
		<div class="copyright">
			<p>Copyright © 2014-05-30 校缘 All Rights Reserved.</p>
		</div>
	</footer>
	<!-- footer  end -->

</body>
</html>