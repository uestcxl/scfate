<?php
	$phototeam=Phototeam::model()->findAll();
	$sort=Sort::model()->findAllByAttributes(array('sort_type'=>1));
	$school=Area::model()->findAllByAttributes(array('area_type'=>4));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photographs-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'作品标题'); ?>
		<?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>50,'placeholder'=>'最多填写40个字符')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'上传图片'); ?>
		<?php echo $form->fileField($model,'picture'); 
			if(!empty($model->picture)) echo '原图片：'.$model->picture; 
		?>
		<?php echo $form->error($model,'picture'); ?>
	</div>

	<div>
		<br>
		<h3>分类</h3>
		<p>
		<?php foreach ($sort as $key => $onesort) {?>
			<label><input type="radio" value='<?php echo $onesort->id?>' name="Photographs[sort_id]"><?php echo $onesort->sort_name?></label>
		<?php }?>
		</p>
		<?php echo $form->error($model,'sort_id'); ?>
	</div>

	<div>
		<br>
		<h3>摄影团队</h3>
		<p>
		<?php foreach ($phototeam as $key => $team) {?>
			<label><input type="radio" value='<?php echo $team->id?>' name="Photographs[phototeam_id]"><?php echo $team->team_name?></label>
		<?php }?>
		</p>
		<?php echo $form->error($model,'phototeam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'摄影作品描述'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'placeholder'=>'对摄影作品的简介')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div>
		<br>
		<h3>所属学校</h3>
		<p>
		<?php if(!empty($school)){foreach ($school as $key => $oneschool) {?>
			<label><input type="radio" value='<?php echo $oneschool->id?>' name="Photographs[school_id]"><?php echo $oneschool->area_name?></label>
		<?php }} else{?>
			<label> 还没有添加学校！<a href="<?php echo $this->createUrl('area/create')?>">点击添加</a></label>
		<?php }?>
		</p>
		<?php echo $form->error($model,'school_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'学校名字'); ?>
		<?php echo $form->textField($model,'school',array('size'=>45,'maxlength'=>45,'placeholder'=>'请填写学校的名称')); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->