<?php
/* @var $this SortController */
/* @var $data Sort */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_name')); ?>:</b>
	<?php echo CHtml::encode($data->sort_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_type')); ?>:</b>
	<?php echo CHtml::encode($data->sort_type); ?>
	<br />


</div>