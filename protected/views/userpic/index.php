<?php
/* @var $this UserpicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Userpics',
);

$this->menu=array(
	array('label'=>'Create Userpic', 'url'=>array('create')),
	array('label'=>'Manage Userpic', 'url'=>array('admin')),
);
?>

<h1>Userpics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
