<?php
/* @var $this PhotographsController */
/* @var $model Photographs */

$this->breadcrumbs=array(
	'Photographs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Photographs', 'url'=>array('index')),
	array('label'=>'Create Photographs', 'url'=>array('create')),
	array('label'=>'Update Photographs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Photographs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Photographs', 'url'=>array('admin')),
);
?>

<h1>View Photographs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'piture',
		'sort_id',
		'phototeam_id',
		'create_time',
		'description',
		'school_id',
		'school',
	),
)); ?>
