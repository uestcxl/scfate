<?php
/* @var $this UserpicController */
/* @var $model Userpic */

$this->breadcrumbs=array(
	'Userpics'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userpic', 'url'=>array('index')),
	array('label'=>'Create Userpic', 'url'=>array('create')),
	array('label'=>'View Userpic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Userpic', 'url'=>array('admin')),
);
?>

<h1>Update Userpic <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>