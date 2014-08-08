<?php
/* @var $this SentspotController */
/* @var $data SentSpot */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spot_name')); ?>:</b>
	<?php echo CHtml::encode($data->spot_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sent_area')); ?>:</b>
	<?php echo CHtml::encode($data->sent_area); ?>
	<br />


</div>