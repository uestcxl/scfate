<?php
/* @var $this AreaController */
/* @var $data Area */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_name')); ?>:</b>
	<?php echo CHtml::encode($data->area_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_type')); ?>:</b>
	<?php echo CHtml::encode($data->area_type); ?>
	<br />


</div>