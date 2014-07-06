<?php
/* @var $this SentSpotController */
/* @var $model SentSpot */

$this->breadcrumbs=array(
	'Sent Spots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SentSpot', 'url'=>array('index')),
	array('label'=>'Create SentSpot', 'url'=>array('create')),
	array('label'=>'View SentSpot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SentSpot', 'url'=>array('admin')),
);
?>

<h1>Update SentSpot <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>