<?php
/* @var $this PhototeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Phototeams',
);

$this->menu=array(
	array('label'=>'Create Phototeam', 'url'=>array('create')),
	array('label'=>'Manage Phototeam', 'url'=>array('admin')),
);
?>

<h1>Phototeams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
