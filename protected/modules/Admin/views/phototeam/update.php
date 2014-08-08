<?php
/* @var $this PhototeamController */
/* @var $model Phototeam */

$this->breadcrumbs=array(
	'Phototeams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Phototeam', 'url'=>array('index')),
	array('label'=>'Create Phototeam', 'url'=>array('create')),
	array('label'=>'View Phototeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Phototeam', 'url'=>array('admin')),
);
?>

<h1>Update Phototeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>