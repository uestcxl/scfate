<?php
/* @var $this SentspotController */
/* @var $model SentSpot */

$this->breadcrumbs=array(
	'Sent Spots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SentSpot', 'url'=>array('index')),
	array('label'=>'Manage SentSpot', 'url'=>array('admin')),
);
?>

<h1>Create SentSpot</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>