<?php
/* @var $this PhotographsController */
/* @var $model Photographs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photographs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'piture'); ?>
		<?php echo $form->textField($model,'piture',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'piture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_id'); ?>
		<?php echo $form->textField($model,'sort_id'); ?>
		<?php echo $form->error($model,'sort_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phototeam_id'); ?>
		<?php echo $form->textField($model,'phototeam_id'); ?>
		<?php echo $form->error($model,'phototeam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_id'); ?>
		<?php echo $form->textField($model,'school_id'); ?>
		<?php echo $form->error($model,'school_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->textField($model,'school',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->