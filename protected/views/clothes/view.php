<?php
/* @var $this ClothesController */
/* @var $model Clothes */

$this->breadcrumbs=array(
	'Clothes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Clothes', 'url'=>array('index')),
	array('label'=>'Create Clothes', 'url'=>array('create')),
	array('label'=>'Update Clothes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Clothes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clothes', 'url'=>array('admin')),
);
?>

<h1>View Clothes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'clothesname',
		'rent',
		'cash_pledge',
		'reserve',
		'sort_id',
		'description',
		'piture',
		'comment_count',
		'sale_count',
		'size',
	),
)); ?>
