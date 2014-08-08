<?php
/* @var $this PhototeamController */
/* @var $model Phototeam */

$this->breadcrumbs=array(
	'Phototeams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Phototeam', 'url'=>array('index')),
	array('label'=>'Create Phototeam', 'url'=>array('create')),
	array('label'=>'Update Phototeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Phototeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Phototeam', 'url'=>array('admin')),
);
?>

<h1>View Phototeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'team_name',
		'phone',
		'QQ',
		'email',
	),
)); ?>
