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
				<span>LOGIN</span>
				<span class="lable_Ch">用户登录</span>
				<span class="lable_El lable_El_all"></span>
			</div>
			<!--lable end-->
			<!--login begin-->
			<div class="login">

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login',	
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>

				<div class="login_left">
					<div class="login_left_pic">
						<img src="<?php echo Yii::app()->baseUrl?>/html/img/login_pic.png">
					</div>
					<div class="login_left_form">
						<form>
							<div class="form_part login_form">
								<span>用户名：</span>
								<input type="text" name="LoginForm[username]">
								<?php echo $form->error($model,'username'); ?>
							</div>
							<div class="form_part login_form">
								<span>密&nbsp;&nbsp;码：</span>
								<input type="password" name="LoginForm[password]">
								<?php echo $form->error($model,'password'); ?>
							</div>
							
							<div class="rememberMe" style="padding-left: 22px">
								<?php echo $form->checkBox($model,'rememberMe'); ?>
								<?php echo $form->label($model,'记住我'); ?>
								<?php echo $form->error($model,'rememberMe'); ?>
							</div>

							<div class="form_btn">
								<input type="submit" class="btn" value="立即登录">
								<span>忘记密码？</span>
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
						<a href="<?php echo Yii::app()->createUrl('user/create')?>"><input type="button" class="btn" value="立即注册"></a>
					</div>
				</div>

				<?php $this->endWidget();?>
			</div>
			<!--login end-->

		</div>
		<!--login end-->
	</section>
	<!-- section  end -->