<?php
/* @var $this IndexpicController */
/* @var $model Indexpic */

$this->breadcrumbs=array(
	'Indexpics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Indexpic', 'url'=>array('index')),
	array('label'=>'Manage Indexpic', 'url'=>array('admin')),
);
?>

<h1>Create Indexpic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>