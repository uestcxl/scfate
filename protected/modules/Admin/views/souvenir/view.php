<?php
/* @var $this SouvenirController */
/* @var $model Souvenir */

$this->breadcrumbs=array(
	'Souvenirs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Souvenir', 'url'=>array('index')),
	array('label'=>'Create Souvenir', 'url'=>array('create')),
	array('label'=>'Update Souvenir', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Souvenir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Souvenir', 'url'=>array('admin')),
);
?>

<h1>View Souvenir #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
		'reduce_price',
		'is_reduce',
		'area_id',
		'school_id',
		'school',
		'description',
		'sort_id',
		'picture',
		'sale_count',
		'comment_count',
	),
)); ?>
