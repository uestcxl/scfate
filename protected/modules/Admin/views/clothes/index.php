<?php
/* @var $this ClothesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clothes',
);

$this->menu=array(
	array('label'=>'Create Clothes', 'url'=>array('create')),
	array('label'=>'Manage Clothes', 'url'=>array('admin')),
);
?>

<h1>Clothes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
