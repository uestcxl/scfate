<?php
/* @var $this SentspotController */
/* @var $model SentSpot */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sent-spot-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'spot_name'); ?>
		<?php echo $form->textField($model,'spot_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'spot_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sent_area'); ?>
		<?php echo $form->textField($model,'sent_area'); ?>
		<?php echo $form->error($model,'sent_area'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->