<?php
/* @var $this SouvenirController */
/* @var $model Souvenir */

$this->breadcrumbs=array(
	'Souvenirs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Souvenir', 'url'=>array('index')),
	array('label'=>'Manage Souvenir', 'url'=>array('admin')),
);
?>

<h1>Create Souvenir</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>