<?php
/* @var $this PhotographsController */
/* @var $model Photographs */

$this->breadcrumbs=array(
	'Photographs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Photographs', 'url'=>array('index')),
	array('label'=>'Create Photographs', 'url'=>array('create')),
	array('label'=>'View Photographs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Photographs', 'url'=>array('admin')),
);
?>

<h1>Update Photographs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>