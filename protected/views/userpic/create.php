<?php
/* @var $this UserpicController */
/* @var $model Userpic */

$this->breadcrumbs=array(
	'Userpics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Userpic', 'url'=>array('index')),
	array('label'=>'Manage Userpic', 'url'=>array('admin')),
);
?>

<h1>Create Userpic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>