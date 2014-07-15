<?php
/* @var $this ClothesController */
/* @var $model Clothes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clothesname'); ?>
		<?php echo $form->textField($model,'clothesname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rent'); ?>
		<?php echo $form->textField($model,'rent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cash_pledge'); ?>
		<?php echo $form->textField($model,'cash_pledge'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reserve'); ?>
		<?php echo $form->textField($model,'reserve'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_id'); ?>
		<?php echo $form->textField($model,'sort_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'picture'); ?>
		<?php echo $form->textField($model,'picture',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment_count'); ?>
		<?php echo $form->textField($model,'comment_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sale_count'); ?>
		<?php echo $form->textField($model,'sale_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->