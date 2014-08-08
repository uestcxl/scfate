<?php
/* @var $this PhotographsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Photographs',
);

$this->menu=array(
	array('label'=>'Create Photographs', 'url'=>array('create')),
	array('label'=>'Manage Photographs', 'url'=>array('admin')),
);
?>

<h1>Photographs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
