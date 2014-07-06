<?php
/* @var $this ClothesController */
/* @var $model Clothes */

$this->breadcrumbs=array(
	'Clothes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clothes', 'url'=>array('index')),
	array('label'=>'Create Clothes', 'url'=>array('create')),
	array('label'=>'View Clothes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Clothes', 'url'=>array('admin')),
);
?>

<h1>Update Clothes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>