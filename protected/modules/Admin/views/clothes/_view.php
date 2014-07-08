<?php
/* @var $this ClothesController */
/* @var $data Clothes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clothesname')); ?>:</b>
	<?php echo CHtml::encode($data->clothesname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rent')); ?>:</b>
	<?php echo CHtml::encode($data->rent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_pledge')); ?>:</b>
	<?php echo CHtml::encode($data->cash_pledge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reserve')); ?>:</b>
	<?php echo CHtml::encode($data->reserve); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_id')); ?>:</b>
	<?php echo CHtml::encode($data->sort_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('piture')); ?>:</b>
	<?php echo CHtml::encode($data->piture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_count')); ?>:</b>
	<?php echo CHtml::encode($data->comment_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sale_count')); ?>:</b>
	<?php echo CHtml::encode($data->sale_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	*/ ?>

</div>