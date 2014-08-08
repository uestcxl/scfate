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


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'分类名称'); ?>
		<?php echo $form->textField($model,'sort_name',array('size'=>50,'maxlength'=>50,'placeholder'=>'最多30个字符')); ?>
		<?php echo $form->error($model,'sort_name'); ?>
	</div>
	
	<div>
		<br>
		<h3>分类所属类别:</h3>
		<p>
		<label><input type="radio" value='0' name="Sort[sort_type]">衣服</label>
		<label><input type="radio" value='1' name="Sort[sort_type]">纪念品</label>
		<label><input type="radio" value='2' name="Sort[sort_type]">作品</label>
		</p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->