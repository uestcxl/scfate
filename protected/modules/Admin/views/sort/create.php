<?php
/* @var $this SortController */
/* @var $model Sort */

$this->breadcrumbs=array(
	'Sorts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sort', 'url'=>array('index')),
	array('label'=>'Manage Sort', 'url'=>array('admin')),
);
?>

<h1>创建分类</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>