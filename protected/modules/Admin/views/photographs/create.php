<?php
/* @var $this PhotographsController */
/* @var $model Photographs */

$this->breadcrumbs=array(
	'Photographs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Photographs', 'url'=>array('index')),
	array('label'=>'Manage Photographs', 'url'=>array('admin')),
);
?>

<h1>添加展示作品</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>