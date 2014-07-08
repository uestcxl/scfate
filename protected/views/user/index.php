<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/user.css">
	
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/main.js"></script>
</head>
<!-- section  begin -->
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
					<a href="user_order.html"><div class="menu_list">我的订单</div></a>
					<a href="<?php echo Yii::app()->createUrl('user/user_address')?>"><div class="menu_list">我的地址</div></a>
					<a href="user_photos.html"><div class="menu_list">我的相册</div></a>
					<a href="user_friends.html"><div class="menu_list">我的朋友</div></a>
					<a href="user_systemMessage.html"><div class="menu_list">系统消息</div></a>
				</div>
			</div>
			<!--menu end-->
			<!--user_section begin-->
			<div class="all_lable">
				<!--lable begin-->
				<div  class="lable">
					<span>ACCOUNT</span>
					<span class="lable_Ch">我的账户</span>
					<span class="lable_El lable_El_some"></span>
				</div>
				<!--lable end-->
				<!--account begin-->
				<div class="account">
					<nav class="user_nav">
						<div id="nav_information" class="select" onclick="showBox('information','rePasswords','reInformation')"></div>
						<div id="nav_rePasswords" class="no" onclick="showBox('rePasswords','information','reInformation')"></div>
						<div id="nav_reInformation" class="no" onclick="showBox('reInformation','information','rePasswords')"></div>
					</nav>
					<div>
						<div id="nav_information_concent">
							<div class="account_head">
								<img src="">
								<input type="button" class="btn btn_no" value="更换头像">
							</div>
							<div class="information_form">
								<form>
									<div class="form_part">
										<span>用户名：</span>
										<input type="text" readonly value="<?php echo Yii::app()->user->name;?>">						
									</div>
									<div class="form_part">
										<span>电子邮箱：</span>
										<input type="text" readonly value="<?php echo $model->mail;?>">
									</div>
									<div class="form_part">
										<span>真实姓名：</span>
										<input type="text" readonly value="
										<?php 
										if (!isset($model->name)) {
											echo '请输入你的真实姓名';
										}
										else{
											echo  $model->name;
										}
										?>">
									</div>
						
									<div class="form_part">
										<span>QQ：</span>
										<input type="text" readonly value="
                                                                                                                                                                <?php 
										if (!isset($model->name)) {
											echo '请输入你的QQ';
										}
										else{
											echo  $model->QQ;
										}
										?>
										">
									</div>
								                <div class="form_part">
										<span>手机：</span>
										<input type="text" readonly value="<?php echo $model->phone?>">
									</div>
								</form>
							</div>
						</div>
						<?php $form=$this->beginWidget('CActiveForm', array(
	                                                                                                 'id'=>'changepassword',
	                                                                                                 'action'=>array('user/changpassword'),
	                                                                                                 'enableAjaxValidation'=>false,
                                                                                                 )); ?>

						<div id="nav_rePasswords_concent">
							<div class="rePasswords_form">
								<form>
									<div class="form_part">
										<span>原密码：</span>
										<input type="password" name="User[password]">
								                                <?php echo $form->error($model,'password'); ?>
									</div>
									<div class="form_part">
										<span>新密码：</span>
										<input type="password" name="User[password1]">
								                             
									</div>
									<div class="form_part">
										<span>确认密码：</span>
										<input type="password" name="User[password2]">
								                          
									</div>
									<div class="form_btn">
										<input type="submit" class="btn" value="确认修改">
									</div>
								</form>
							</div>
						</div>
						<?php $this->endWidget(); ?>
						<div id="nav_reInformation_concent">
							<div class="account_head">
								<img src="">
								<input type="button" class="btn" value="更换头像">
							</div>
					                          <?php $form=$this->beginWidget('CActiveForm', array(
	                                                                                                 'id'=>'changeziliao',
	                                                                                                 'action'=>array('user/changeziliao'),
	                                                                                                 'enableAjaxValidation'=>false,
                                                                                           )); ?>
							<div class="reInformation_form">
								<form>
								             <div class="form_part">
										<span>用户名：</span>
										<input type="text" readonly value="<?php echo Yii::app()->user->name;?>">						
									</div>
							
									<div class="form_part">
										<span>电子邮箱：</span>
										<input type="text" name="User[mail]" value="<?php echo $model->mail;?>">
								                          <?php echo $form->error($model,'mail'); ?>
									</div>
									<div class="form_part">
										<span>真实姓名：</span>
										<input type="text" name="User[name]" value="
										<?php 
										if (!isset($model->name)) {
											echo '请输入你的真实姓名';
										}
										else{
											echo  $model->name;
										}
										?>">
								                          <?php echo $form->error($model,'name'); ?>
									</div>							
									<div class="form_part">
										<span>QQ：</span>
										<input type="text" name="User[QQ]" value="
										<?php 
										if (!isset($model->name)) {
											echo '请输入你的QQ';
										}
										else{
											echo  $model->QQ;
										}
										?>">
								                          <?php echo $form->error($model,'QQ'); ?>
									</div>
									<div class="form_part">
										<span>手机：</span>
										<input type="text" name="User[phone]" value="<?php echo $model->phone?>">
								                          <?php echo $form->error($model,'phone'); ?>
									</div>
									<div class="form_btn">
										<input type="submit" class="btn" value="保存修改">
									</div>
								</form>
							</div>
							<?php $this->endWidget(); ?>
						</div>
					</div>
				</div>
				<!--account end-->
			</div>
			<!--user_section end-->
			<!--user end-->
		</div>
	</section>
