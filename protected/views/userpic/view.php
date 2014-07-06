<?php
/* @var $this UserpicController */
/* @var $model Userpic */

$this->breadcrumbs=array(
	'Userpics'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Userpic', 'url'=>array('index')),
	array('label'=>'Create Userpic', 'url'=>array('create')),
	array('label'=>'Update Userpic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Userpic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userpic', 'url'=>array('admin')),
);
?>

<h1>View Userpic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'userid',
		'picture',
		'create_time',
		'title',
		'description',
	),
)); ?>
