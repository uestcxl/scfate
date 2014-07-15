<?php
/* @var $this ClothesController */
/* @var $model Clothes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clothes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'clothesname'); ?>
		<?php echo $form->textField($model,'clothesname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'clothesname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rent'); ?>
		<?php echo $form->textField($model,'rent'); ?>
		<?php echo $form->error($model,'rent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_pledge'); ?>
		<?php echo $form->textField($model,'cash_pledge'); ?>
		<?php echo $form->error($model,'cash_pledge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reserve'); ?>
		<?php echo $form->textField($model,'reserve'); ?>
		<?php echo $form->error($model,'reserve'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_id'); ?>
		<?php echo $form->textField($model,'sort_id'); ?>
		<?php echo $form->error($model,'sort_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->textField($model,'picture',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_count'); ?>
		<?php echo $form->textField($model,'comment_count'); ?>
		<?php echo $form->error($model,'comment_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sale_count'); ?>
		<?php echo $form->textField($model,'sale_count'); ?>
		<?php echo $form->error($model,'sale_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->