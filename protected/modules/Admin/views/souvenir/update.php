<?php
/* @var $this SouvenirController */
/* @var $model Souvenir */

$this->breadcrumbs=array(
	'Souvenirs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Souvenir', 'url'=>array('index')),
	array('label'=>'Create Souvenir', 'url'=>array('create')),
	array('label'=>'View Souvenir', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Souvenir', 'url'=>array('admin')),
);
?>

<h1>Update Souvenir <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>