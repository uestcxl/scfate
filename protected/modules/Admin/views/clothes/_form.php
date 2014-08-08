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
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
		<?php echo $form->dropDownList($model,'sort_id',Clothes::model()->getsortlist()); ?>
		<?php echo $form->error($model,'sort_id'); ?>
	</div>

<!-- ueditor js-->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/protected/extensions/ueditor/ueditor.config.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/protected/extensions/ueditor/ueditor.all.js'; ?>"></script>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('id'=>'myEditor')); ?>
			<script type="text/javascript">
		    	var editor = new UE.ui.Editor({initialFrameHeight:500});
		    	editor.render("myEditor");
			</script>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->fileField($model,'picture'); 
			if(!empty($model->picture)) echo '原图片：'.$model->picture; 
		?>
		<?php echo $form->error($model,'picture'); ?>
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