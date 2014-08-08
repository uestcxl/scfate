<?php
/* @var $this SentspotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sent Spots',
);

$this->menu=array(
	array('label'=>'Create SentSpot', 'url'=>array('create')),
	array('label'=>'Manage SentSpot', 'url'=>array('admin')),
);
?>

<h1>Sent Spots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
