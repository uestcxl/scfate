<?php
/* @var $this IndexpicController */
/* @var $model Indexpic */

$this->breadcrumbs=array(
	'Indexpics'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Indexpic', 'url'=>array('index')),
	array('label'=>'Create Indexpic', 'url'=>array('create')),
	array('label'=>'View Indexpic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Indexpic', 'url'=>array('admin')),
);
?>

<h1>Update Indexpic <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>