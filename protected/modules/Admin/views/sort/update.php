<?php
/* @var $this SortController */
/* @var $model Sort */

$this->breadcrumbs=array(
	'Sorts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sort', 'url'=>array('index')),
	array('label'=>'Create Sort', 'url'=>array('create')),
	array('label'=>'View Sort', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sort', 'url'=>array('admin')),
);
?>

<h1>Update Sort <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>