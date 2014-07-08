<?php
/* @var $this SentSpotController */
/* @var $model SentSpot */

$this->breadcrumbs=array(
	'Sent Spots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SentSpot', 'url'=>array('index')),
	array('label'=>'Create SentSpot', 'url'=>array('create')),
	array('label'=>'Update SentSpot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SentSpot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SentSpot', 'url'=>array('admin')),
);
?>

<h1>View SentSpot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'spot_name',
		'sent_area',
	),
)); ?>
