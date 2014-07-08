<?php
/* @var $this ClothesController */
/* @var $model Clothes */

$this->breadcrumbs=array(
	'Clothes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clothes', 'url'=>array('index')),
	array('label'=>'Manage Clothes', 'url'=>array('admin')),
);
?>

<h1>Create Clothes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>