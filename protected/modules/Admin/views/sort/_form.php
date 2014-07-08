<?php
/* @var $this SortController */
/* @var $model Sort */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sort-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_name'); ?>
		<?php echo $form->textField($model,'sort_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sort_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_type'); ?>
		<?php echo $form->textField($model,'sort_type'); ?>
		<?php echo $form->error($model,'sort_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->