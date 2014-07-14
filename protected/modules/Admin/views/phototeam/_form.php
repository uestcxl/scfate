<?php
/* @var $this PhototeamController */
/* @var $model Phototeam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phototeam-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'团队名称'); ?>
		<?php echo $form->textField($model,'team_name',array('size'=>30,'maxlength'=>120,'placeholder'=>'最多40个字符')); ?>
		<?php echo $form->error($model,'team_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'电话号码'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'QQ'); ?>
		<?php echo $form->textField($model,'QQ',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'QQ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->