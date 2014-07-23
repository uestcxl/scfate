<style type="text/css">
	#changepic{
		padding-left: 50px;
		padding-top: 20px;
		border: 0px;
	}
</style>
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
					<?php if (empty($me->picture)) {?>
						<img src="<?php echo Yii::app()->baseUrl.'/images/user/default.gif'?>">
					<?php }else{ ?>
						<img src="<?php echo Yii::app()->baseUrl.'/images/user/'.$me->picture?>">
					<?php }?>
				</div>
				<div class="information_form">
					<form>
						<div class="form_part">
							<span>用户名：</span>
							<label for=""><?php echo Yii::app()->user->name;?></label>
						</div>
						<div class="form_part">
							<span>电子邮箱：</span>
							<!-- <input type="text" readonly value="<?php echo $model->mail;?>"> -->
							<label for=""><?php echo $model->mail?></label>
						</div>
						<div class="form_part">
							<span>真实姓名：</span>
							<?php if(!empty($model->name)){?>
							<!-- <input type="text" readonly value="<?php echo $model->name;?>"> -->
							<label for=""><?php echo $model->name?></label>
							<?php }else{?>
							<label for="">请输入你的真实姓名</label>
							<?php }?>
						</div>
			
						<div class="form_part">
							<span>QQ：</span>
							<?php if (empty($model->QQ)) {?>
								<label for="">尚未填写</label>
							<?php } else{?>
								<label for=""><?php echo $model->QQ?></label>
							<?php }?>
						</div>
					    <div class="form_part">
							<span>手机：</span>
							<label for=""><?php echo $model->phone?></label>
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

			<!--用户头像-->
	            <?php $form=$this->beginWidget('CActiveForm', array(
                                   'id'=>'changepic',
                                   'action'=>array('user/changepic'),
                                   'enableAjaxValidation'=>false,
                                   	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            	            )); ?>
				<div class="account_head">
					<?php if (empty($me->picture)) {?>
						<img src="<?php echo Yii::app()->baseUrl.'/images/user/default.gif'?>">
					<?php }else{ ?>
						<img src="<?php echo Yii::app()->baseUrl.'/images/user/'.$me->picture?>">
					<?php }?>
					<?php echo $form->fileField($model,'picture',array('value'=>'更换头像','id'=>'changepic')); ?>
					<?php echo $form->error($model,'picture'); ?>
					<div class="form_btn">
							<input type="submit" class="btn" value="提交头像">
					</div>
				</div>
		<?php $this->endWidget(); ?>
	
	    <?php $form=$this->beginWidget('CActiveForm', array(
                                   'id'=>'changeziliao',
                                   'action'=>array('user/changeziliao'),
                                   'enableAjaxValidation'=>false,
            	            )); ?>
				<div class="reInformation_form">
					<form>
					    <div class="form_part">
							<span>用户名：</span>
							<?php echo Yii::app()->user->name;?>
						</div>
				
						<div class="form_part">
							<span>电子邮箱：</span>
							<input type="text" name="User[mail]" value="<?php echo $model->mail;?>">
					                          <?php echo $form->error($model,'mail'); ?>
						</div>
						<div class="form_part">
							<span>真实姓名：</span>
							<?php if(!empty($model->name)){?>

							<input type="text"  name="User[name]" value="<?php echo $model->name;?>">
							<?php }else{?>
							<input type="text" name="User[name]" value="请输入你的真实姓名">

							
							<?php }?>
					        <?php echo $form->error($model,'name'); ?>
						</div>							
						<div class="form_part">
							<span>QQ：</span>
							<?php if(!empty($model->QQ)){?>

							<input type="text" name="User[QQ]"  value="<?php echo $model->QQ;?>">
							<?php }else{?>
							<input type="text" name="User[QQ]" value="请输入你的qq">
							<?php }?>
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