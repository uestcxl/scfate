<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/user.css">
</head>
	<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<!--login begin-->
		<div class="all_lable">
			<!--lable begin-->
			<div  class="lable">
				<span>JOIN&nbsp;US</span>
				<span class="lable_Ch">用户注册</span>
				<span class="lable_El lable_El_all"></span>
			</div>
			<!--lable end-->
			<!--login begin-->
			<div class="register">
				<div class="register_left">
					<h1>请填写注册信息</h1>
					<div class="register_left_form">
						<form>
							<div>
								<div class="form_part register_form">
									<span>用户名：</span>
									<input type="text">	
								</div>
								<span>用于登录的名字</span>
							</div>
							<div>
								<div class="form_part register_form">
									<span>密&nbsp;&nbsp;码：</span>
									<input type="passwords">	
								</div>
								<span>您的密码</span>
							</div>
							<div>
								<div class="form_part register_form">
									<span>确认密码：</span>
									<input type="passwords">	
								</div>
								<span>重复输入密码</span>
							</div>
							<div>
								<div class="form_part register_form">
									<span>电&nbsp;&nbsp;话：</span>
									<input type="text">	
								</div>
								<span>请输入电话</span>
							</div>
							<div>
								<div class="form_part register_form">
									<span>邮&nbsp;&nbsp;箱：</span>
									<input type="text">	
								</div>
								<span>请输入有效邮箱</span>
							</div>
							<div>
								<div class="form_part register_form">
									<span>验证码：</span>
									<input type="text">	
								</div>
								<span></span>
							</div>
							<div class="form_btn">
								<input type="submit" class="btn" value="立即注册">
							</div>

						</form>
					</div>
				</div>
			
				<div class="login_right">
					<div>
						<p>友情提示：</p>
						<p>如果您还不是会员，请注册</p>
						<p>注册后您就可以</p>
						<p>1.保存您的个人资料</p>
						<p>2.收藏您关注的商品</p>
						<p>3.订阅本店商品信息</p>
						<h2>已经拥有账号</h2>
						<a href="<?php echo Yii::app()->createUrl('site/login')?>"><input type="button" class="btn" value="立即登陆"></a>
					</div>
				</div>
			</div>
			<!--login end-->

		</div>
		<!--login end-->
	</section>
	<!-- section  end -->