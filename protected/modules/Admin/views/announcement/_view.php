<?php
/* @var $this AnnouncementController */
/* @var $data Announcement */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('公告标题')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('内容')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('创建时间')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />



</div>