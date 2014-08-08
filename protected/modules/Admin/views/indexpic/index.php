<?php
/* @var $this IndexpicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indexpics',
);

$this->menu=array(
	array('label'=>'Create Indexpic', 'url'=>array('create')),
	array('label'=>'Manage Indexpic', 'url'=>array('admin')),
);
?>

<h1>Indexpics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
