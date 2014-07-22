<?php
/* @var $this SouvenirController */
/* @var $model Souvenir */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'souvenir-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'纪念品名称'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'原价'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'优惠价格'); ?>
		<?php echo $form->textField($model,'reduce_price'); ?>
		<?php echo $form->error($model,'reduce_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_reduce'); ?>
		<?php echo $form->textField($model,'is_reduce'); ?>
		<?php echo $form->error($model,'is_reduce'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_id'); ?>
		<?php echo $form->dropDownList($model,'area_id',Area::model()->getarealist()); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_id'); ?>
		<?php echo $form->dropDownList($model,'school_id',Area::model()->getschoollist()); ?>
		<?php echo $form->error($model,'school_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_id'); ?>
		<?php echo $form->dropDownList($model,'sort_id',Sort::model()->getsortlist()); ?>
		<?php echo $form->error($model,'sort_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->fileField($model,'picture'); 
			if(!empty($model->picture)) echo '原图片：'.$model->picture; 
		?>
		<?php echo $form->error($model,'picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sale_count'); ?>
		<?php echo $form->textField($model,'sale_count'); ?>
		<?php echo $form->error($model,'sale_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_count'); ?>
		<?php echo $form->textField($model,'comment_count'); ?>
		<?php echo $form->error($model,'comment_count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->