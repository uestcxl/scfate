<?php
/* @var $this AreaController */
/* @var $model Area */
/* @var $form CActiveForm */

$areas=Area::model()->findAll();
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<br>
		<h3>父地区id</h3>
		<p>
		<?php if(!empty($areas)){foreach ($areas as $key => $area) {?>
			<label><input type="radio" value='<?php echo $area->id?>' name="Area[parent_id]"><?php echo $area->area_name?></label>
		<?php }} else{?>
			<input type="text" name="Area[parent_id]" value="1">
		<?php }?>
		</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'地区名称'); ?>
		<?php echo $form->textField($model,'area_name',array('size'=>20,'maxlength'=>45,'不多于30个字符')); ?>
		<?php echo $form->error($model,'area_name'); ?>
	</div>

	<div class="row">
		<h3>地区类型</h3>
		<label><input type="radio" value="0" name="Area[area_type]">国家</label>
		<label><input type="radio" value="1" name="Area[area_type]">省份</label>
		<label><input type="radio" value="2" name="Area[area_type]">地级市</label>
		<label><input type="radio" value="3" name="Area[area_type]">区/县</label>
		<label><input type="radio" value="4" name="Area[area_type]">学校</label>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->